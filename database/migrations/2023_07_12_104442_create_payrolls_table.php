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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('bank_name')->nullable();
            $table->text('banck_account_number')->nullable();
            $table->string('salary')->nullable();
            $table->string('Amount')->nullable();
            $table->string('due')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('edit_date')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_type')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
};
