@extends('layouts.master')

@section('content')
    <h4>Data Transaksi</h4>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<div class="card shadow">
  <div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pelanggan</th>
                <th>Layanan</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksis as $t)
            <tr>
                <td>{{ $t->id }}</td>
                <td>{{ $t->pelanggan->nama }}</td>
                <td>{{ $t->layanan->nama }}</td>
                <td>{{ $t->jumlah }}</td>
                <td>Rp {{ number_format($t->total_harga,0,',','.') }}</td>
                <td>
                    <a href="{{ route('transaksi.edit',$t->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transaksi.destroy',$t->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus transaksi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endsection
