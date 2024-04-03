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
        Schema::table('tkeranjang', function (Blueprint $table) {
            $table->unsignedBigInteger('userId')->after('id_keranjang');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tkeranjang', function (Blueprint $table) {
            $table->dropColumn('userId');
            $table->dropForeign('userId');
        });
    }
};
