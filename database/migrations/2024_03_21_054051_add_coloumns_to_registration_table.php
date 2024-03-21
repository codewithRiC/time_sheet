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
        Schema::table('registration', function (Blueprint $table) {
            $table->unsignedBigInteger('TID')->nullable();
            $table->foreign('TID')->references('TID')->on('tasks');

            $table->unsignedBigInteger('DID')->nullable();
            $table->foreign('DID')->references('DID')->on('department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registration', function (Blueprint $table) {
            //
        });
    }
};
