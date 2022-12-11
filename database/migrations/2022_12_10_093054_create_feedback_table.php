<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->longText('isi');
            $table->enum('status', ['Puas', 'Tidak Puas', 'Tidak ada keterangan',])->nullable()->default('Tidak ada keterangan');
            $table->text('foto')->nullable();
            $table->longText('kritik')->nullable();

            $table->unsignedBigInteger('laporan_id')->nullable();
            $table->foreign('laporan_id')->references('id')->on('laporan')->onDelete('cascade');
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
        Schema::dropIfExists('feedback');
    }
}
