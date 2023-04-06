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
        Schema::create('empolyeereports', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('empolyee');
            $table->integer('incoming')->default('0');
            $table->integer('outgoing')->default('0');
            $table->integer('total');
            $table->integer('cash');
            $table->string('card');
            $table->longText('note');
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
        Schema::dropIfExists('empolyeereports');
    }
};
