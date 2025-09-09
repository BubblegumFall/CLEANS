@extends('layouts.user')
@section('title', 'Detail Transaksi')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Transaksi</h1>
        <a href="{{ route('user.transaksi.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
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

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Kode Transaksi</th>
                                <td>{{ $transaksi->kode_transaksi }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <td>{{ $transaksi->tanggal_transaksi }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Layanan</th>
                                <td>{{ $transaksi->layanan ? $transaksi->layanan->jenis_layanan : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Berat</th>
                                <td>{{ $transaksi->berat }} Kg</td>
                            </tr>
                            <tr>
                                <th>Harga per Kg</th>
                                <td>{{ $transaksi->layanan ? 'Rp ' . number_format($transaksi->layanan->harga_per_kilo, 0, ',', '.') : '-' }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $transaksi->formattedTotal }}</td>
                            </tr>
                            @if($transaksi->diskon > 0)
                            <tr>
                                <th>Diskon</th>
                                <td>{{ $transaksi->formattedDiskon }}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Total Akhir</th>
                                <td><strong>{{ $transaksi->formattedTotalAkhir }}</strong></td>
                            </tr>
                            <tr>
                                <th>Status</th>
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
                            </tr>
                            <tr>
                                <th>Status Pembayaran</th>
                                <td>
                                    @if($transaksi->status_pembayaran == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($transaksi->status_pembayaran == 'dibayar')
                                        <span class="badge badge-success">Dibayar</span>
                                    @else
                                        <span class="badge badge-danger">Dibatalkan</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    @if($transaksi->status == 'pending' && $transaksi->status_pembayaran == 'pending')
                    <div class="mt-3">
                        <form action="{{ route('user.transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi ini?')">
                                <i class="fas fa-trash mr-1"></i> Batalkan Transaksi
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pembayaran</h6>
                </div>
                <div class="card-body">
                    @if($transaksi->status_pembayaran == 'pending')
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle mr-2"></i> Pembayaran belum dilakukan
                    </div>
                    <p>Silakan lakukan pembayaran ke:</p>
                    <div class="card bg-light">
                        <div class="card-body">
                            <h6 class="card-title">Rekening Tujuan</h6>
                            <p class="card-text">
                                <strong>Bank:</strong> BCA<br>
                                <strong>No. Rekening:</strong> 1234567890<br>
                                <strong>Atas Nama:</strong> PT. SICLEAN Laundry
                            </p>
                        </div>
                    </div>
                    <p class="mt-3">Setelah melakukan pembayaran, silakan konfirmasi ke admin untuk memperbarui status pembayaran Anda.</p>
                    @elseif($transaksi->status_pembayaran == 'dibayar')
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle mr-2"></i> Pembayaran telah diterima
                    </div>
                    <p>Terima kasih telah melakukan pembayaran. Status transaksi Anda akan diperbarui oleh admin.</p>
                    @endif
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Catatan</h6>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Status transaksi akan diperbarui oleh admin</li>
                        <li>Pembayaran dapat dilakukan melalui transfer bank</li>
                        <li>Diskon 10% berlaku untuk transaksi di atas Rp 100.000</li>
                        <li>Hubungi admin jika ada kendala</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection