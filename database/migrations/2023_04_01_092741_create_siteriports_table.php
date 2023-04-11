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
            $table->integer('user_id')->nullable();
            $table->text('password')->nullable();
            $table->string('verifi_code')->nullable();
            $table->date('payment_date')->nullable();
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
