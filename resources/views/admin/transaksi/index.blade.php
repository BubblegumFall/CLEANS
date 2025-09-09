@extends('layouts.user')
@section('title', 'Riwayat Transaksi')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
        <a href="{{ route('user.transaksi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Buat Transaksi Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            @if(count($transaksis) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal</th>
                                <th>Layanan</th>
                                <th>Berat (Kg)</th>
                                <th>Total</th>
                                <th>Diskon</th>
                                <th>Total Akhir</th>
                                <th>Status</th>
                                <th>Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksis as $index => $transaksi)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksi->tanggal_transaksi }}</td>
                                    <td>{{ $transaksi->layanan ? $transaksi->layanan->jenis_layanan : '-' }}</td>
                                    <td>{{ $transaksi->berat }}</td>
                                    <td>{{ $transaksi->formattedTotal }}</td>
                                    <td>{{ $transaksi->formattedDiskon }}</td>
                                    <td>{{ $transaksi->formattedTotalAkhir }}</td>
                                    <td>
                                        @if($transaksi->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($transaksi->status == 'proses')
                                            <span class="badge badge-info">Diproses</span>
                                        @elseif($transaksi->status == 'selesai')
                                            <span class="badge badge-success">Selesai</span>
                                        @else
                                            <span class="badge badge-danger">Dibatalkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($transaksi->status_pembayaran == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($transaksi->status_pembayaran == 'dibayar')
                                            <span class="badge badge-success">Dibayar</span>
                                        @else
                                            <span class="badge badge-danger">Dibatalkan</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('user.transaksi.show', $transaksi->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($transaksi->status == 'pending' && $transaksi->status_pembayaran == 'pending')
                                            <form action="{{ route('user.transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $transaksis->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                    <h5 class="text-gray-500">Belum ada data transaksi</h5>
                    <p class="text-gray-400">Silakan buat transaksi baru untuk melihat riwayat transaksi Anda.</p>
                    <a href="{{ route('user.transaksi.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-1"></i> Buat Transaksi Baru
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endpush