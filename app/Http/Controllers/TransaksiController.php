<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function create()
{
    $pelanggans = Pelanggan::all();
    $layanans   = Layanan::all();

    return view('admin.transaksi.create', compact('pelanggans', 'layanans'));
}


    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'layanan_id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $total_harga = $layanan->harga * $request->jumlah;

        Transaksi::create([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        // ✅ route pakai prefix "admin"
        return redirect()->route('admin.transaksi.index')
                         ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::all();
        $layanans = Layanan::all();
        return view('admin.transaksi.edit', compact('transaksi', 'pelanggans', 'layanans'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'layanan_id' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $total_harga = $layanan->harga * $request->jumlah;

        $transaksi->update([
            'pelanggan_id' => $request->pelanggan_id,
            'layanan_id' => $request->layanan_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
        ]);

        // ✅ route pakai prefix "admin"
        return redirect()->route('admin.transaksi.index')
                         ->with('success', 'Transaksi berhasil diupdate');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        // ✅ route pakai prefix "admin"
        return redirect()->route('admin.transaksi.index')
                         ->with('success', 'Transaksi berhasil dihapus');
    }
}
