<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveilancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveilances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->Integer('Q_Center');
            $table->Integer('House_Q');
            $table->string('dateTime');

            $table->unsignedInteger('ref_key')->index();
        });

        Schema::table('surveilances', function(Blueprint $table) {
            $table->foreign('ref_key')->references('id_n')->on('agencies');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveilances');
    }
}
