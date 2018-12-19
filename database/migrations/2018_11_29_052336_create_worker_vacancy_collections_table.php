<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkerVacancyCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_vacancy_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id')
                ->nullable(false);
            $table->integer('vacancy_id')
                ->nullable(false);
            $table->timestamps();

            $table->index('worker_id');
            $table->index('vacancy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worker_project_collections');
    }
}
