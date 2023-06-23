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
        Schema::create('siteriports', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('site_name')->nullable();
            $table->longText('url')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('user_id')->default('0')->nullable();
            $table->text('password')->nullable();
            $table->longText('why_create')->nullable();
            $table->text('number')->nullable();
            $table->string('verifi_code')->nullable();
            $table->date('payment_date')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('siteriports');
    }
};
