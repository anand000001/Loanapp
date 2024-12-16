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
        Schema::create('grouploans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->string('leader_name')->nullable();
            $table->string('leader_number')->nullable();
            $table->string('teamlead_name')->nullable();
            $table->string('teamlead_number')->nullable();
            $table->integer('totalgroup_member')->nullable();
            $table->decimal('loan_amount', 15, 2)->nullable();
            $table->decimal('intrest_rate', 5, 2)->nullable();
            $table->string('type')->nullable();
            $table->decimal('collected_amount', 15, 2)->nullable();
            $table->string('duration')->nullable();
            $table->decimal('disburse_rate', 5, 2)->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
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
        Schema::dropIfExists('grouploans');
    }
};
