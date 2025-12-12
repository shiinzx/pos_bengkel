<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // php artisan make:model Buku

    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';
    protected $fillable = ['kode_']
}
