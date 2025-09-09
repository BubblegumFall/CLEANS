<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'layanan_id',
        'kode_transaksi',
        'tanggal_transaksi',
        'berat',
        'total',
        'diskon',
        'total_akhir',
        'status',
        'status_pembayaran',
    ];
    
    /**
     * Get the user that owns the transaksi.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the layanan that owns the transaksi.
     */
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
    
    /**
     * Accessor for formatted total
     */
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }
    
    /**
     * Accessor for formatted diskon
     */
    public function getFormattedDiskonAttribute()
    {
        return 'Rp ' . number_format($this->diskon, 0, ',', '.');
    }
    
    /**
     * Accessor for formatted total_akhir
     */
    public function getFormattedTotalAkhirAttribute()
    {
        return 'Rp ' . number_format($this->total_akhir, 0, ',', '.');
    }
}