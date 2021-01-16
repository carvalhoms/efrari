<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->unique();
                $table->unsignedBigInteger('linha_id')->nullable();
                $table->unsignedBigInteger('descricao_id')->nullable();
            $table->string('comp')->nullable();
            $table->string('img')->nullable();

                $table->foreign('linha_id')->references('id')->on('linhas');
                $table->foreign('descricao_id')->references('id')->on('descricoes');

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
        Schema::dropIfExists('produtos');
    } 
}
