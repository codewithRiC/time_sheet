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
        Schema::create('assigntask', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UID')->nullable();
            $table->foreign('id')->references('id')->on('registration');
            $table->unsignedBigInteger('TID')->nullable();
            $table->foreign('TID')->references('TID')->on('tasks');
            $table->date('StartDate');
            $table->string('Remark',100);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assigntask');
    }
};
