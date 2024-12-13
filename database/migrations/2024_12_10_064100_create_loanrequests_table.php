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
        Schema::create('loanrequests', function (Blueprint $table) {
            $table->id();
            $table->decimal('loan_amount', 10, 2)->nullable();
            $table->integer('loan_duration')->nullable(); 
            $table->string('guarantor')->nullable();
            $table->string('guarantor_contacts')->nullable();
            $table->string('salary_slip1')->nullable();
            $table->string('salary_slip2')->nullable();
            $table->string('salary_slip3')->nullable();
            $table->string('cheque')->nullable();
            $table->string('bank_statement')->nullable();
            $table->string('live_video')->nullable();
            $table->date('loan_requestdate')->nullable();
            $table->date('loan_approveddate')->nullable();
            $table->date('loan_rejecteddate')->nullable();
            $table->string('loan_status')->nullable();
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
        Schema::dropIfExists('loanrequests');
    }
};
