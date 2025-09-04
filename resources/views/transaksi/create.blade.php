@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Tambah Transaksi</h4>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pelanggan</label>
            <select name="pelanggan_id" class="form-control">
                @foreach($pelanggans as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Layanan</label>
            <select name="layanan_id" class="form-control">
                @foreach($layanans as $l)
                <option value="{{ $l->id }}">{{ $l->nama }} - Rp {{ number_format($l->harga,0,',','.') }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" min="1">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
