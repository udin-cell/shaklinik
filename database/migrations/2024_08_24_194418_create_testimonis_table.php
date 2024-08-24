<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('users_id')->nullable();
            $table->biginteger('product_id')->nullable();
            $table->biginteger('treatmen_id')->nullable();
            $table->text('foto_before')->nullable();
            $table->text('foto_after')->nullable();
            $table->text('testimoni_text')->nullable();

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
        Schema::dropIfExists('testimonis');
    }
}
