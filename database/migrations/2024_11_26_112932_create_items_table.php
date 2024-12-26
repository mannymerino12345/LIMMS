<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id'); // Primary key
            $table->string('item_image')->nullable();
            $table->foreignId('laboratory_id')->constrained('laboratories', 'lab_id'); // Foreign key referencing 'lab_id'
            $table->string('item_name');
            $table->text('item_description');
            $table->integer('quantity');
            $table->foreignId('category_id')->constrained('item_category', 'category_id'); // Foreign key referencing 'item_category' table
            $table->integer('days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
