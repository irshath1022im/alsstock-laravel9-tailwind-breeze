<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTransectionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_transection_logs', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('transection_type');
            $table->unsignedBigInteger('item_size_id');
            $table->integer('qty');
            $table->text('remark')->nullable();

            $table->foreign('item_size_id')->references('id')->on('item_sizes');
            $table->foreign('transection_type')->references('id')->on('transection_types');
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
        Schema::dropIfExists('item_transection_logs');
    }
}
