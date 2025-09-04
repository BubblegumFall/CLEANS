@extends('layouts.admin')

@section('content')
<div class="container">
    <h4>Tambah Transaksi</h4>
    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        {{-- Pilih Pelanggan --}}
        <div class="mb-3">
            <label for="pelanggan_id">Pelanggan</label>
            <select name="pelanggan_id" id="pelanggan_id" class="form-control select2">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach($pelanggans as $p)
                <option value="{{ $p->id }}">{{ $p->nama }} - {{ $p->email }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Layanan --}}
        <div class="mb-3">
            <label for="layanan_id">Layanan</label>
            <select name="layanan_id" id="layanan_id" class="form-control select2">
                <option value="">-- Pilih Layanan --</option>
                @foreach($layanans as $l)
                <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">
                    {{ $l->nama }} - Rp {{ number_format($l->harga,0,',','.') }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Jumlah --}}
        <div class="mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
        </div>

        {{-- Total Harga --}}
        <div class="mb-3">
            <label>Total Harga</label>
            <input type="text" id="total_harga" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<!-- Tambah Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "classic",
            width: '100%'
        });

        function hitungTotal() {
            let harga = $('#layanan_id option:selected').data('harga') || 0;
            let jumlah = parseInt($('#jumlah').val()) || 0;
            let total = harga * jumlah;
            $('#total_harga').val(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total));
        }

        $('#layanan_id, #jumlah').on('change keyup', function() {
            hitungTotal();
        });
    });
</script>
@endpush
