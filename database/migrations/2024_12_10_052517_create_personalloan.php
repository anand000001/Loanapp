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
        Schema::create('personalloan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->decimal('loan_amount', 10, 2)->nullable();
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->string('type', 50)->nullable(); // e.g., loan type
            $table->decimal('collected_amount', 10, 2)->nullable();
            $table->integer('duration')->nullable(); // in months or years
            $table->date('disburse_date')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->decimal('total_interest', 10, 2)->nullable();
            $table->date('next_emidate')->nullable();
            $table->string('agent_code', 50)->nullable();
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
        Schema::dropIfExists('personalloan');
    }
};
