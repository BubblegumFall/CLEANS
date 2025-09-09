<!-- Tambahkan di resources/views/admin/layanan/index.blade.php atau view transaksi admin yang sesuai -->
<td>
    @if($transaksi->status_pembayaran == 'pending')
        <form action="{{ route('admin.transaksi.updatePaymentStatus', $transaksi->id) }}" method="POST" style="display: inline-block;">
            @csrf
            <input type="hidden" name="status_pembayaran" value="dibayar">
            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pembayaran telah diterima?')">
                <i class="fas fa-check"></i> Konfirmasi Bayar
            </button>
        </form>
    @endif
</td>