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
        Schema::create('adminriports', function (Blueprint $table) {
            $table->id();
            $table->integer('house_rent')->default(0)->nullable();
            $table->integer('gard_bill')->default(0)->nullable();
            $table->integer('electricity_bill')->default(0)->nullable();
            $table->integer('sewerage_bill')->default(0)->nullable();
            $table->integer('expanse')->default(0)->nullable();
            $table->integer('personal')->default(0)->nullable();

            $table->integer('water_bill')->default(0)->nullable();
            $table->integer('fewa_bill')->default(0)->nullable();
            $table->integer('wifi_bill')->default(0)->nullable();
            $table->integer('a')->default(0)->nullable();
            $table->integer('b')->default(0)->nullable();
            $table->integer('c')->default(0)->nullable();
            $table->longText('note')->nullable();

            $table->integer('total')->default(0)->nullable();
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
        Schema::dropIfExists('adminriports');
    }
};
