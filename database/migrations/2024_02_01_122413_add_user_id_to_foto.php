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
        Schema::table('foto', function (Blueprint $table) {
            $table->unsignedBigInteger('userId')->after('albumId');
            $table->foreign('userId')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foto', function (Blueprint $table) {
              $table->id('fotoId');
            $table->string('judulfoto',255);
            $table->string('deskripsiFoto',255);
            $table->date('tanggalUnggah');
            $table->string('lokasiFile',255);
        });
    }
};
