<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatmens', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('foto')->nullable();
            $table->string('nama_jasa')->nullable();
            $table->string('bagians_id')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('jenis')->nullable();
            $table->bigInteger('tarif')->nullable();

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
        Schema::dropIfExists('treatmens');
    }
}
