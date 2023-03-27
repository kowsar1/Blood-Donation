<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accept_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId("request_id");
            $table->string('User_name');
            $table->string('User_id');
            $table->string('status');
            $table->string('description')->nullable();
           
            $table->rememberToken();
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
        Schema::dropIfExists('accept_requests');
    }
};
