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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('site_name')->nullable();
            $table->longText('url')->nullable();
            $table->string('user_name')->nullable();
            $table->text('user_id')->nullable();
            $table->text('password')->nullable();
            $table->longText('why_create')->nullable();
            $table->text('number')->nullable();
            $table->string('verifi_code')->nullable();
            $table->date('payment_date')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('personal_infos');
    }
};
