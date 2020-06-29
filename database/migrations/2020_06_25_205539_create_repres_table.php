<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa');
            $table->string('contato');
            $table->string('uf');
            $table->string('cidade');
            $table->string('fone1');
            $table->string('fone2')->nullable();
            $table->string('fone3')->nullable();
            $table->string('fone4')->nullable();
            $table->string('email');
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
        Schema::dropIfExists('repres');
    }
}
