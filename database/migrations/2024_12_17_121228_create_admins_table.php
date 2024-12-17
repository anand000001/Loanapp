<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Primary key: auto-incrementing ID
            $table->unsignedBigInteger('user_id'); // Foreign key: user_id
            $table->string('name'); // Admin's name
            $table->string('email')->unique(); // Admin's email
            $table->string('mobile'); // Admin's mobile
            $table->string('password'); // Admin's password
            $table->timestamps(); // Created_at and Updated_at timestamps

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
