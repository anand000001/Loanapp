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
        Schema::create('emireceipts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile_number'); 
            $table->string('whatsapp_number')->nullable();
            $table->text('address'); 
            $table->decimal('emi_amount', 10, 2);
            $table->string('payment_slip')->nullable(); 
            $table->decimal('paid_emi_amount', 10, 2)->default(0.00); 
            $table->decimal('loan_amount', 10, 2); 
            $table->date('date_of_collect');
            $table->date('last_date_collect'); 
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
        Schema::dropIfExists('emireceipts');
    }
};
