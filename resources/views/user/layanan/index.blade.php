@extends('layouts.user')

@section('title', 'Daftar Layanan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Layanan</h1>

    <!-- Tombol tambah -->
    <a href="{{ route('user.layanan.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Pesan Layanan
    </a>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama Layanan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($layanans as $layanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $layanan->nama_layanan }}</td>
                            <td>Rp {{ number_format($layanan->harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
