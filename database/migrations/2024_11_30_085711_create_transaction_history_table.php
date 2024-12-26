<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('transaction_history', function (Blueprint $table) {
            $table->id('history_id'); // Primary Key
            $table->text('description'); // Description of the transaction
            $table->date('date'); // Date of the transaction
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign Key referencing the 'users' table
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_history');
    }
}
