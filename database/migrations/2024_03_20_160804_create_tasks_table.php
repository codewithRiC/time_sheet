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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('TID');
            $table->string('TaskName',60);
            $table->string('TaskDescription',100);
            $table->string('AssignedTo',50);
            $table->date('TStartDate');
            $table->date('TEndDate');
            $table->string('Status',40);
            $table->string('Priority',40);
            $table->string('Progress',100)->nullable();
            $table->string('Dependencies',100)->nullable();
            $table->string('EmployeeNote',150)->nullable();
            $table->string('ManagerNote',150)->nullable();
            $table->unsignedBigInteger('PID');
            $table->foreign('PID')->references('PID')->on('project');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
