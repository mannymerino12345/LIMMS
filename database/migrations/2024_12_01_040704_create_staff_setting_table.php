<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffSettingTable extends Migration
{
    public function up()
    {
        Schema::create('staff_setting', function (Blueprint $table) {
            $table->id('setting_id');  // Primary Key
            $table->unsignedBigInteger('user_id');  // Foreign Key for User
            $table->string('s_accounts');
            $table->string('s_item');
            $table->string('s_transaction');
            $table->timestamps();
            
            // Add foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_setting');
    }
}
