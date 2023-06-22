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
        Schema::create('adminifos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('salary_raised')->nullable();
            $table->string('salary_receivable')->nullable();
            $table->string('loan_taken')->nullable();
            $table->string('loan_repaid')->nullable();
            $table->text('visa_url')->nullable();
            $table->string('password')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('exchange_name')->nullable();
            $table->string('exchange_account_number')->nullable();
            $table->string('bank_card_number')->nullable();
            $table->string('Pin')->nullable();
            $table->string('online_transfer_Password')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('currency')->nullable();
            $table->string('expairy_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adminifos');
    }
};
