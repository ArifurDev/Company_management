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
            $table->integer('compony_id')->nullable();
            $table->string('empolyee');
            $table->integer('incoming_card');
            $table->integer('incoming_cash');
            $table->integer('incoming')->default('0')->nullable();
            $table->integer('outgoing')->default('0')->nullable();
            $table->integer('cash')->nullable();
            $table->longText('note')->nullable();
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
