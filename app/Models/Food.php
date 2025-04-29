<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image'];

     // Relasi: Satu makanan bisa punya banyak pesanan
     public function pesanans()
     {
         return $this->hasMany(Pesanan::class);
     }
}
