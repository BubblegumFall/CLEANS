<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;

class UserLayananController extends Controller
{
    // Tampilkan daftar layanan yang bisa dipesan user
    public function index()
    {
        $layanans = Layanan::all();
        return view('user.layanan.index', compact('layanans'));
    }

    // Form tambah pesanan layanan
    public function create()
    {
        $layanans = Layanan::all();
        return view('user.layanan.create', compact('layanans'));
    }

    // Simpan pesanan layanan
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanans,id',
        ]);

        // Simpan ke transaksi user
        auth()->user()->transaksis()->create([
            'layanan_id' => $request->layanan_id,
            'status'     => 'pending',
            'total'      => Layanan::find($request->layanan_id)->harga,
        ]);

        return redirect()->route('user.transaksi.index')
                         ->with('success', 'Pesanan berhasil dibuat!');
    }
}
