<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalEkskulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jadwal_ekskul', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('id_ekskul')->nullable();
          $table->string('hari');
          $table->time('jamAwal');
          $table->time('jamAkhir');
          $table->timestamps();
      });

      Schema::table('jadwal_ekskul', function(Blueprint $kolom)
        {
          $kolom->foreign('id_ekskul')->references('id')->on('ekskul')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_ekskul');
    }
}
