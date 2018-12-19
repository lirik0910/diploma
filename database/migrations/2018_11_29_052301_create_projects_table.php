<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')
                ->nullable(false);
            $table->string('duration')
                ->nullable(true);
            $table->string('technologies')
                ->nullable(true);
            $table->string('communicative')
                ->nullable(true);
            $table->float('speed', 5, 2)
                ->nullable(true)
                ->default(0.0);
            $table->string('priorities')
                ->nullable(true);
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
        Schema::dropIfExists('projects');
    }
}
