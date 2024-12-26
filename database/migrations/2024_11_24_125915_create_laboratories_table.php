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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id('lab_id'); // Primary key
            $table->string('lab_name')->unique(); // Laboratory name, must be unique
            $table->string('lab_image')->nullable(); // Path to lab image, optional
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories'); // Directly drop the table if it exists
    }
};
