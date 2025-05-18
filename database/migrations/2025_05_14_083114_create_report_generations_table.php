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
        Schema::create('report_generations', function (Blueprint $table) {
            $table->id();
            $table->date('generated_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('store_request_id');
            $table->unsignedBigInteger('item_size_id');
            $table->string('category');
            $table->string('store');
            $table->integer('qty');

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('store_request_id')->references('id')->on('store_requests');
            $table->foreign('item_size_id')->references('id')->on('item_sizes');
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
        Schema::dropIfExists('report_generations');
    }
};
