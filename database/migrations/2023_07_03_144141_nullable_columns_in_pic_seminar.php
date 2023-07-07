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
            $table->string('setup_tgl_unduh')->nullable()->change();
            $table->string('sertifikat')->nullable()->change();
        });
    }

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pic_seminar', function (Blueprint $table) {
            $table->string('setup_tgl_unduh')->nullable(false)->change();
            $table->string('sertifikat')->nullable(false)->change();
        });
    }
};
