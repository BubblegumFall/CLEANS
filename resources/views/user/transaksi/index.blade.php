@extends('layouts.user')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Riwayat Transaksi</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Transaksi</th>
                        <th>Layanan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->kode }}</td>
                            <td>{{ $transaksi->layanan->nama ?? '-' }}</td>
                            <td>Rp{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge 
                                    @if($transaksi->status == 'pending') badge-warning
                                    @elseif($transaksi->status == 'selesai') badge-success
                                    @else badge-secondary @endif">
                                    {{ ucfirst($transaksi->status) }}
                                </span>
                            </td>
                            <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
