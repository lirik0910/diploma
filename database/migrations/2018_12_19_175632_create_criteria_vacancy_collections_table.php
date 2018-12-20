<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriteriaVacancyCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_vacancy_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacancy_id')
                ->nullable(false);
            $table->integer('criteria_id')
                ->nullable(false);
            $table->string('value')
                ->nullable(false);
            $table->string('priority')
                ->nullable(false)
                ->default(1);
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
        Schema::dropIfExists('criteria_vacancy_collections');
    }
}
