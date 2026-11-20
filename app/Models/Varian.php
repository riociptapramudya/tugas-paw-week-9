<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Varian extends Model
{
    use HasFactory;

    protected $table = 'varian';
    public $timestamps = false; // Karena tabel database tidak punya created_at & updated_at

    protected $fillable = [
        'produk_id',
        'warna',
        'ukuran',
        'stok'
    ];

    // Relasi ke Produk (opsional tapi bagus untuk kedepannya)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}