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
            $table->string('address',15)->nullable()->after('phone');
            $table->string('pin',15)->nullable()->after('phone');
            $table->string('state',15)->nullable()->after('phone');
            $table->string('qualification',15)->nullable()->after('phone');
            $table->string('yoe',15)->nullable()->after('phone');
            $table->string('details',15)->nullable()->after('phone');
           
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
