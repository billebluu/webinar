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
        Schema::table('pic_seminar', function (Blueprint $table) {
            $table->string('nama_poster');
            $table->integer('ukuran_poster');
            $table->string('ekstensi_poster');
            $table->string('poster');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pic_seminar', function (Blueprint $table) {
            //
        });
    }
};
