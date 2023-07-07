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
        //
        Schema::table('pic_seminar', function (Blueprint $table) {
            $table->dropColumn('nama_poster');
            $table->dropColumn('ukuran_poster');
            $table->dropColumn('ekstensi_poster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
