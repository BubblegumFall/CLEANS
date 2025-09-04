@extends('layouts.user') {{-- sidebar khusus user --}}

@section('title', 'Pesan Layanan')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Pesan Layanan</h1>

    <!-- Card -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('user.layanan.store') }}" method="POST">
                @csrf

                <!-- Pilih layanan -->
                <div class="form-group">
                    <label for="layanan_id">Pilih Layanan</label>
                    <select name="layanan_id" id="layanan_id" class="form-control" required>
                        <option value="">-- Pilih Layanan --</option>
                        @foreach ($layanans as $layanan)
                            <option value="{{ $layanan->id }}">
                                {{ $layanan->nama_layanan }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol -->
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Buat Pesanan
                    </button>
                    <a href="{{ route('user.layanan.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
