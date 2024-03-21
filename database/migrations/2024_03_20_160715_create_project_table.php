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
        Schema::create('project', function (Blueprint $table) {
            $table->id('PID');
            $table->string('ProjectName',60);
            $table->string('ProjectDescription',100);
            $table->string('ProjectManager',50);
            $table->date('TStartDate');
            $table->date('TEndDate');
            $table->string('Status',40);
            $table->string('Priority',40);
            $table->string('Tags',50)->nullable();
            $table->string('Dependencies',100)->nullable();
            $table->string('AdminNote',150)->nullable();
            $table->string('ManagerNote',150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
