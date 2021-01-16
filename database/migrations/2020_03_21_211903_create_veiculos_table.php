<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
                $table->unsignedBigInteger('montadora_id');
                $table->unsignedBigInteger('linha_id');

            $table->string('name')->unique();
            $table->timestamps();

                $table->foreign('montadora_id')->references('id')->on('montadoras');
                $table->foreign('linha_id')->references('id')->on('linhas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
