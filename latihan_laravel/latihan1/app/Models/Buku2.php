<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // php artisan make:buku Model

    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';
    protected $fillable = ['kode_buku','merk','type','warna','harga_buku','gambar'];
    
}
