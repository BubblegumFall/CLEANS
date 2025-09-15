@extends('layouts.master')

@section('title', 'Kelola Transaksi')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kelola Transaksi</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Semua Transaksi</h6>
            </div>
            <div class="card-body">
                @if($transaksis->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Jenis Layanan</th>
                                    <th>Berat</th>
                                    <th>Total Bayar</th>
                                    <th>Tanggal</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksis as $transaksi)
                                                    <tr>
                                                        <td>{{ $transaksi->kode_transaksi }}</td>
                                                        <td>{{ $transaksi->user->name }}</td>
                                                        <td>{{ $transaksi->layanan->jenis_layanan }}</td>
                                                        <td>{{ $transaksi->berat }} kg</td>
                                                        <td>Rp {{ number_format($transaksi->total_akhir, 0, ',', '.') }}</td>
                                                        <td>
                                                            {{ is_object($transaksi->tanggal_transaksi)
                                        ? $transaksi->tanggal_transaksi->format('d/m/Y')
                                        : date('d/m/Y', strtotime($transaksi->tanggal_transaksi)) }}
                                                        </td>
                                                        <td>
                                                            <span class="badge 
                                    @if($transaksi->status_pembayaran == 'pending') bg-warning text-dark @endif
                                    @if($transaksi->status_pembayaran == 'lunas') bg-success text-white @endif">
                                                                {{ ucfirst($transaksi->status_pembayaran) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            @if($transaksi->status_pembayaran == 'pending')
                                                                <form action="{{ route('admin.transaksi.lunas', $transaksi->id) }}" method="POST"
                                                                    style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-success btn-sm"
                                                                        onclick="return confirm('Ubah status ke LUNAS?')">
                                                                        <i class="fas fa-check"></i> Tandai Lunas
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <!-- <span class="badge bg-success text-white">LUNAS</span> -->
                                                            @endif

                                                            <a href="{{ route('admin.transaksi.show', $transaksi->id) }}"
                                                                class="btn btn-info btn-sm">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('admin.transaksi.edit', $transaksi->id) }}"
                                                                class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $transaksis->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-receipt fa-3x text-gray-300 mb-3"></i>
                        <h5 class="text-gray-500">Belum ada transaksi</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection