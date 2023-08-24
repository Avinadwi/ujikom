<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    Protected $table = 'pesanan_details';
    protected $fillable = [
        'produk_id',
        'pesanan',
        'jumlah',
        'jumlah_harga'
    ];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

     public function produk()
	{
	      return $this->belongsTo(Produk::class);
	}
}
