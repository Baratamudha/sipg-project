<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('roles_id')->nullable();
            $table->string('namaAwal');
            $table->string('namaAkhir');
            $table->integer('NIP');
            $table->string('password');
            $table->date('tglLahir');
            $table->string('agama', '20');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $kolom)
      {
        $kolom->increments('id');
        $kolom->string('namaRule');
      });

      Schema::table('users', function(Blueprint $kolom)
        {
          $kolom->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
