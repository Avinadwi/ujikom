<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'alamat',
        'nohp'
        
    ];

    public function pesanan() 
    {
         return $this->hasMany('App\Models\Pesanan','user_id', 'id');
    }
}
