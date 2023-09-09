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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->constrained('orders');
            $table->string('name_window');
            $table->string('name_kanji');
            $table->string('name_kana');
            $table->string('post_domicile');
            $table->string('region_domicile');
            $table->string('locality_domicile');
            $table->string('street_domicile');
            $table->string('phone');
            $table->string('email');
            $table->string('remarks');
            $table->integer('user_id')->constrained('users')->nullable();
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
        Schema::dropIfExists('order_details');
    }
};
