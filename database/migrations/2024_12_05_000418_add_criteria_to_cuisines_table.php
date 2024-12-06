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
            $table->string('spicy_level')->nullable();  // Spicy level: Mild, Medium, Hot
            $table->string('dietary_option')->nullable(); // Dietary options: Vegan, Vegetarian, Gluten-Free
            $table->boolean('is_available')->default(true); // Availability: Yes/No
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cuisines', function (Blueprint $table) {
            $table->dropColumn(['spicy_level', 'dietary_option', 'is_available']);
        });
    }
};
