<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_request_items', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();
            $table->unsignedBigInteger('store_request_id');
            $table->unsignedBigInteger('item_size_id');
            $table->integer('qty');
            $table->text('remark')->nullable();
            $table->timestamps();
            $table->foreign('store_request_id')->references('id')->on('store_requests');
            $table->foreign('item_size_id')->references('id')->on('item_sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_request_items');
    }
}
