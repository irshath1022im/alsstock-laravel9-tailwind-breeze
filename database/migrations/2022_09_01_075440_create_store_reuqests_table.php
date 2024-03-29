<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreReuqestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_reuqests', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->id();
            $table->date('date');
            $table->string('requestedBy');
            $table->string('approvedBy');
            $table->text('remark')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('store_reuqests');
    }
}
