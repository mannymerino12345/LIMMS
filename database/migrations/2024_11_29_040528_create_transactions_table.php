<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id'); // Primary Key
            $table->foreignId('item_id')->constrained('items', 'item_id')->onDelete('cascade'); // Foreign key referencing 'items.item_id'
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade'); // Foreign key referencing 'users.id'
            $table->integer('quantity');
            $table->date('borrow_date');
            $table->time('borrow_time');
            $table->date('return_date')->nullable();
            $table->time('return_time')->nullable();
            $table->date('due_date');
            $table->enum('status', ['pending', 'returned', 'approved']); // Enum for status
            $table->timestamps(); // Created at and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
