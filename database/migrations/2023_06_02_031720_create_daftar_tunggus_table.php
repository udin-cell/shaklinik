<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTunggusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_tunggus', function (Blueprint $table) {
            $table->id();
            $table->string('no_urut')->nullable();
            $table->string('kode_jadwal')->nullable();
            $table->bigInteger('dokter_id')->nullable();
            $table->biginteger('users_id')->nullable();
            $table->bigInteger('treatmen_id')->nullable();
            $table->time('jam')->nullable();
            $table->date('tgl')->nullable();
            $table->biginteger('jumlah')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('daftar_tunggus');
    }
}
