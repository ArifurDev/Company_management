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
        Schema::create('billdates', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('house_rent')->nullable();
            $table->string('gard_bill')->nullable();
            $table->string('electricity_bill')->nullable();
            $table->string('sewerage_bill')->nullable();
            $table->string('water_bill')->nullable();
            $table->string('fewa_bill')->nullable();
            $table->string('wifi_bill')->nullable();
            $table->string('a')->nullable();
            $table->string('b')->nullable();
            $table->string('c')->nullable();
            $table->string('empolyee')->nullable();

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
        Schema::dropIfExists('billstrings');
    }
};
