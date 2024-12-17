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
        Schema::create('savingacs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email'); 
            $table->string('mobile'); 
            $table->string('whatsapp_number')->nullable(); 
            $table->decimal('amount', 10, 2);
            $table->date('account_request_date'); 
            $table->date('create_account_date')->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('savingacs');
    }
};
