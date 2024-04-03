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
        Schema::table('like_foto', function (Blueprint $table) {
            $table->unsignedBigInteger('userId')->after('likeId');
            $table->foreign('userId')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('like_foto', function (Blueprint $table) {
            $table->dropColumn('userId');
            $table->dropForeign('userId');
        });
    }
};
