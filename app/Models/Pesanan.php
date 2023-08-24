<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
	use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = [
        'user_id',
        'tanggal',
        'status',
        'kode',
        'jumlah_harga',
        'bukti_bayar',
    ];
	/*protected $guarded = ['id'];

    protected $casts = [
        'product' => 'array'
    ];*/
    public function pesanan_detail() : hasMany
	{
	     return $this->hasMany(PesananDetail::class);
	}
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
