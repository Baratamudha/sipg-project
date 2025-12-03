<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('murid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nis');
            $table->string('nama');
            $table->date('tglLahir');
            $table->string('jenisKelamin');
            $table->unsignedInteger('id_kelas')->nullable();
            $table->timestamps();
        });

        Schema::table('murid', function(Blueprint $kolom)
          {
            $kolom->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('murid');
    }
}
