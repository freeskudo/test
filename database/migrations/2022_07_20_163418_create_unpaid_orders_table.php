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
        Schema::create('unpaid_orders', function (Blueprint $table) {
            $table->id();

            $table->integer('lottery_id')->constrained('lotteries');
            $table->string('renban_centenary')->nullable();
            $table->string('renban_denary')->nullable();
            $table->string('fukuren_centenary')->nullable();
            $table->string('bara_centenary')->nullable();
            $table->string('bara_denary')->nullable();
            $table->string('sanrenbara_tricenary')->nullable();
            $table->string('fukubara_centenary')->nullable();

            $table->string('post_delivery')->nullable();
            $table->string('region_delivery')->nullable();
            $table->string('locality_delivery')->nullable();
            $table->string('street_delivery')->nullable();
            $table->string('date_purchase')->nullable();

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
        Schema::dropIfExists('unpaid_orders');
    }
};
