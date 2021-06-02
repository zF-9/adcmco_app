<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actives', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('Name');
            $table->string('Status');
            $table->string('dateTime');

            $table->unsignedInteger('ref_key')->index();
        });

        Schema::table('actives', function(Blueprint $table) {
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
        Schema::dropIfExists('actives');
    }
}
