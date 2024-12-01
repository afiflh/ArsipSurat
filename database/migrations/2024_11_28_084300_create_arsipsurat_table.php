<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateArsipsuratTable extends Migration
{
    public function up()
    {
        Schema::create('arsipsurat', function (Blueprint $table) {
            // Membuat kolom id_surat sebagai primary key
            $table->id('id_surat');
            $table->string('nomor_surat')->unique();
            $table->foreignId('id_kategori')->constrained('categories', 'id_kategori')->cascadeOnDelete();
            $table->string('judul');
            $table->timestamp('waktu_pengarsipan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('arsipsurat');
    }
}
