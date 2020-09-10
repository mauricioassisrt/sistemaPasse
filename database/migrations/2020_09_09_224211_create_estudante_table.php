<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudante', function (Blueprint $table) {
            $table->id();
            $table->string('nomeAluno');
            $table->string('responsavel');
            $table->string('naturalidade');
            $table->string('telefone');
            $table->string('rgResponsavel');
            $table->string('cpfResponsavel')->unique();
            $table->string('rgResponsavelFoto');
            $table->string('cpfResponsavelFoto');
            $table->string('certidaoNascimentoAlunoFoto');
            $table->string('possuiCpf');
            $table->string('declaracaoMatricula');
            $table->string('instituicao');
            $table->string('serie');
            $table->string('turno');
            $table->string('curso');
            $table->string('comprovanteResidencia');
            $table->string('cep');
            $table->string('rua');
            $table->string('numeroCasa');
            $table->string('bairro');
            $table->string('cidade');
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
        Schema::dropIfExists('estudante');
    }
}