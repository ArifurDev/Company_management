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
            $table->date('house_rent')->nullable();
            $table->date('gard_bill')->nullable();
            $table->date('electricity_bill')->nullable();
            $table->date('sewerage_bill')->nullable();
            $table->date('water_bill')->nullable();
            $table->date('fewa_bill')->nullable();
            $table->date('wifi_bill')->nullable();
            $table->date('a')->nullable();
            $table->date('b')->nullable();
            $table->date('c')->nullable();
            $table->date('empolyee')->nullable();

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
        Schema::dropIfExists('billdates');
    }
};
