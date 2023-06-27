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
        Schema::create('mainloans', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->string("image")->default('default.jpg');
            $table->integer("amount")->nullable();
            $table->integer("installment")->nullable();
            $table->integer("per_installment")->nullable();
            $table->string("loan_type")->nullable();
            $table->string("payment_date")->nullable();
            $table->string("status")->nullable();
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
        Schema::dropIfExists('mainloans');
    }
};
