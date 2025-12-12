<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string("kode_buku",10);
            $table->integer("id_kategori",50);
            $table->string("judul",100);
            $table->string("penulis",50);
            $table->string("penerbit",100);
            $table->year("tahun");
        });
        Schema::create('anggota', function (Blueprint $table){
            $table->id();
            $table->string("nama",100);
            $table->string("jk",10);
            $table->string("alamat",100);
        });
        Schema::create('kategori', function (Blueprint $table){
            $table->id();
            $table->string("nama_kategori",100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');        
        Schema::dropIfExists('anggota');        
        Schema::dropIfExists('kategori');        

    }
};
