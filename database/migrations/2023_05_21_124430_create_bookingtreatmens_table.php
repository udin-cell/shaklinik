<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingtreatmensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingtreatmens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->nullable();

            $table->string('kode')->nullable();
            $table->string('nama_pemesan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->time('jam_janji')->nullable();
            $table->date('tgl_janji')->nullable();
            $table->bigInteger('total_price')->nullable();
            $table->string('payment')->default('MIDTRANS');
            $table->string('payment_url')->nullable();
            $table->string('status')->default('PROSES');


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
        Schema::dropIfExists('bookingtreatmens');
    }
}
