<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_data_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('phone', 50)->nullable();
            $table->text('message')->nullable();
            $table->text('video_url')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('form_data_users');
    }
}
