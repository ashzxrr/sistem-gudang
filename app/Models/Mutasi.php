<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    
    protected $table = 'mutasis';

    protected $fillable = [
        'user_id',
        'barang_id',
        'tanggal',
        'jenis_mutasi',
        'jumlah',
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
