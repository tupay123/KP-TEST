<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'food_id',
        'nama_pemesan',
        'no_hp',
        'jumlah',
        'catatan',
        'order_id',   // ditambahkan untuk Midtrans
        'status',     // ditambahkan untuk Midtrans
    ];

    // Relasi ke model Food
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
