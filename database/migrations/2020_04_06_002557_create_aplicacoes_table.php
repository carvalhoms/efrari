<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAplicacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
                $table->unsignedBigInteger('produto_id');
                $table->unsignedBigInteger('montadora_id')->nullable();
            $table->string('aplic');

                $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
                $table->foreign('montadora_id')->references('id')->on('montadoras')->onDelete('cascade');
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
        Schema::dropIfExists('aplicacoes');
    }
}
