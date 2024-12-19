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
        Schema::create('emi_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('mobile'); 
            $table->decimal('loan_amount', 15, 2);
            $table->string('collection_type');
            $table->date('date_of_collect');
            $table->integer('emi_number'); 
            $table->decimal('emi_amount', 15, 2);
            $table->decimal('paid_emi_amount', 15, 2)->default(0); 
            $table->decimal('remaining_amount', 15, 2);
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('emi_tables');
    }
};
