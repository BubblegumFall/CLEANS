<div class="mb-3">
    <label for="jumlah">Jumlah</label>
    <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $transaksi->jumlah }}" min="1" required>
</div>

<div class="mb-3">
    <label>Total Harga</label>
    <input type="text" id="total_harga" class="form-control" readonly 
        value="Rp {{ number_format($transaksi->total_harga,0,',','.') }}">
</div>

@push('scripts')
<script>
    $(document).ready(function() {
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
