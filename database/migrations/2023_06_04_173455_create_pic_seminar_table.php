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
        Schema::create('pic_seminar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->string('nama_seminar');
            $table->string('deskripi_seminar');
            $table->string('lokasi_seminar');
            $table->string('gmaps_seminar');
            $table->date('tanggal_seminar');
            $table->string('gratis_berbayar');
            $table->string('vidcon_seminar');
            $table->date('tgl_pendaftaran_awal');
            $table->date('tgl_pendaftaran_akhir');
            $table->string('setup_tgl_unduh');
            $table->string('sertifikat');
            $table->timestamps();
        });

        Schema::table('pic_seminar', function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pic_seminar');
    }
};
