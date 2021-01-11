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
        Schema::create('estudantes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_cadastro')->nullable($value = true);
            $table->string('protocolo')->nullable($value = true);
            $table->string('nome_aluno')->nullable($value = true);
            $table->string('responsavel')->nullable($value = true);
            $table->string('naturalidade')->nullable($value = true);
            $table->string('telefone')->nullable($value = true);
            $table->string('rg_aluno_foto')->nullable($value = true);
            $table->string('cpf_aluno_foto')->nullable($value = true);
            $table->string('rg_aluno')->nullable($value = true);
            $table->string('cpf_aluno')->nullable($value = true);
            $table->string('rg_responsavel')->nullable($value = true);
            $table->string('cpf_responsavel')->nullable($value = true);
            $table->string('rg_responsavel_foto')->nullable($value = true);
            $table->string('cpf_responsavel_foto')->nullable($value = true);
            $table->string('certidao_nascimento_aluno_foto')->nullable($value = true);
            $table->string('possuiCpf')->nullable($value = true);
            $table->string('declaracao_matricula')->nullable($value = true);
            $table->string('instituicao')->nullable($value = true);
            $table->string('serie')->nullable($value = true);
            $table->string('turno')->nullable($value = true);
            $table->string('curso')->nullable($value = true);
            $table->string('comprovante_residencia')->nullable($value = true);
            $table->string('cep')->nullable($value = true);
            $table->string('rua')->nullable($value = true);
            $table->string('numero_casa')->nullable($value = true);
            $table->string('bairro')->nullable($value = true);
            $table->string('cidade')->nullable($value = true);

            // $table->integer('user_id')->unsigned();
            // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudantes');
    }
}
