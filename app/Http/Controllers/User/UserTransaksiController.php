<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTransaksiController extends Controller
{
    // Tampilkan semua transaksi user yang sedang login
    public function index()
    {
        $transaksis = auth()->user()->transaksis()->with('layanan')->latest()->get();
        return view('user.transaksi.index', compact('transaksis'));
    }

    // Detail transaksi
    public function show($id)
    {
        $transaksi = auth()->user()->transaksis()->with('layanan')->findOrFail($id);
        return view('user.transaksi.show', compact('transaksi'));
    }
}
