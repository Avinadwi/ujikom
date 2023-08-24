<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory; 
    protected $table = 'produks';
    protected $fillable = [
        'kode',
        'nama_barang',
        'harga',
        'berat',
        'deskripsi',
        'stok',
        'foto',
    ];

    public function produk()
	{
	      return $this->belongsTo(Produk::class);
	}

	public function pesanan()
	{
	      return $this->belongsTo(Pesanan::class);
	}
}