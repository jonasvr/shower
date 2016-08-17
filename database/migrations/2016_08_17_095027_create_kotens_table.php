<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKotensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kotens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('street');
            $table->string('nr');
            $table->string('city');
            $table->integer('postalcode');
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
        Schema::drop('kotens');
    }
}
