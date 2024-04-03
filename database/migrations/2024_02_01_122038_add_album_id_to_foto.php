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
            $table->unsignedBigInteger('albumId')->after('lokasiFile');
            $table->foreign('albumId')->references('albumId')->on('album')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foto', function (Blueprint $table) {
            $table->dropColumn('albumId');
            $table->dropForeign('albumId');
        });
    }
};
