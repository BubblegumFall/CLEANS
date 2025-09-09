<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::where('user_id', auth()->id())->latest()->paginate(10);
        return view('user.transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanans = \App\Models\Layanan::all();
        return view('user.transaksi.create', compact('layanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',
        ]);

        $layanan = \App\Models\Layanan::findOrFail($request->layanan_id);
        
        // Generate kode transaksi
        $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . Str::random(4);
        
        // Hitung total
        $total = $layanan->harga_per_kilo * $request->berat;
        
        // Hitung diskon (misal: 10% jika total > 100000)
        $diskon = 0;
        if ($total > 100000) {
            $diskon = $total * 0.1;
        }
        
        // Hitung total akhir
        $totalAkhir = $total - $diskon;
        
        // Create transaksi
        $transaksi = Transaksi::create([
            'user_id' => auth()->id(),
            'layanan_id' => $request->layanan_id,
            'kode_transaksi' => $kodeTransaksi,
            'tanggal_transaksi' => date('Y-m-d'),
            'berat' => $request->berat,
            'total' => $total,
            'diskon' => $diskon,
            'total_akhir' => $totalAkhir,
            'status' => 'pending',
            'status_pembayaran' => 'pending',
        ]);
        
        return redirect()->route('user.transaksi.show', $transaksi->id)
            ->with('success', 'Transaksi berhasil dibuat! Silakan lakukan pembayaran.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Transaksi::where('user_id', auth()->id())->findOrFail($id);
        return view('user.transaksi.show', compact('transaksi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('user_id', auth()->id())->findOrFail($id);
        
        // Hanya bisa menghapus transaksi dengan status pending
        if ($transaksi->status != 'pending' || $transaksi->status_pembayaran != 'pending') {
            return redirect()->back()->with('error', 'Hanya transaksi dengan status pending yang dapat dibatalkan');
        }
        
        $transaksi->delete();
        
        return redirect()->route('user.transaksi.index')->with('success', 'Transaksi berhasil dibatalkan');
    }
}