<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->string('ket_alamat');
            $table->string('pekerjaan');
            $table->string('nama_toko')->default('-');
            $table->string('alamat_toko')->default('-');
            $table->string('gaji');
            $table->string('jk');
            $table->string('ttl');
            $table->string('tlpn');
            $table->string('email');
            $table->string('password');
            $table->string('sts')->default('0');
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
        Schema::dropIfExists('pelanggans');
    }
}
