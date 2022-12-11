<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_hidden')->nullable()->default(false);
            $table->enum('kategori', ['Aspirasi', 'Keluhan'])->nullable();
            $table->longText('isi');
            $table->enum('status', ['Masuk', 'Diterima', 'Ditolak', 'Diproses', 'Selesai'])->nullable()->default('Masuk');
            $table->text('foto')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}
