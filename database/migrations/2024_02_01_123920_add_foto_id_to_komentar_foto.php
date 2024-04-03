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
        Schema::table('komentar_foto', function (Blueprint $table) {
            $table->unsignedBigInteger('fotoId')->after('userId');
            $table->foreign('fotoId')->references('fotoId')->on('foto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('komentar_foto', function (Blueprint $table) {
            $table->dropColumn('fotoId');
            $table->dropForeign('fotoId');
        });
    }
};
