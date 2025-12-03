<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jadwal_mapel', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('id_kelas')->nullable();
          $table->unsignedInteger('id_mapel')->nullable();
          $table->string('hari');
          $table->time('jamAwal');
          $table->time('jamAkhir');
          $table->timestamps();
      });

      Schema::table('jadwal_mapel', function(Blueprint $kolom)
        {
          $kolom->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
          $kolom->foreign('id_mapel')->references('id')->on('mapel')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_mapel');
    }
}
