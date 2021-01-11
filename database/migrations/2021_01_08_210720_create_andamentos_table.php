<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAndamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            para iniciar uma chave estrangeira deve-se observar
            1º o tipo do id da tabela de origem se é integer bigint etc
            2º a sequencia da criação primeiro criar-se o campo dentro da tabela
            depois cria-se a foreign_key

        */
        Schema::create('andamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->string('detalhes')->nullable($value = true);
            $table->timestamps();
            $table->integer('estudante_id')->unsigned();
            $table->foreign('estudante_id')->references('id')->on('estudantes');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('andamentos');
    }
}
