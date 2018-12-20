<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacteristicWorkerCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristic_worker_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id')
                ->nullable(false);
            $table->integer('characteristic_id')
                ->nullable(false);
            $table->string('value')
                ->nullable(false);
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
        Schema::dropIfExists('characteristic_worker_collections');
    }
}
