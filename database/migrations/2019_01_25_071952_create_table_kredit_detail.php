<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKreditDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kredit_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kredit_id');
            $table->string('lama_cicilan');
            $table->string('suku_bunga');
            $table->string('cicilan');
            $table->date('jatuh_tempo');
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
        Schema::dropIfExists('kredit_details');
    }
}
