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
        Schema::table('cuisines', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->nullable();  // Allowing nullable values for price
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cuisines', function (Blueprint $table) {
            $table->dropColumn('price');    
        });
    }
};
