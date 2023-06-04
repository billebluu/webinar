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
        Schema::create('data_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_peserta')->unsigned();
            $table->bigInteger('id_pic_seminar')->unsigned();
            $table->string('bukti_pembayaran');
            $table->date('tgl_pembayaran');
            $table->string('sumber_info');
            $table->timestamps();
        });

        Schema::table('data_pendaftaran', function(Blueprint $table){
            $table->foreign('id_peserta')->references('id')->on('peserta')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pic_seminar')->references('id')->on('pic_seminar')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendaftaran');
    }
};
