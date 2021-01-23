<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'data_cadastro',
        'protocolo',
        'nome_aluno',
        'responsavel',
        'naturalidade',
        'telefone',
        'rg_aluno_foto',
        'cpf_aluno_foto',
        'rg_aluno',
        'gratuidade',
        'cartao_entregue',
        'cpf_aluno',
        'rg_responsavel',
        'cpf_responsavel',
        'rg_responsavel_foto',
        'cpf_responsavel_foto',
        'certidao_nascimento_aluno_foto',
        'possuiCpf',
        'declaracao_matricula',
        'instituicao',
        'serie',
        'turno',
        'curso',
        'comprovante_residencia',
        'cep',
        'rua',
        'numero_casa',
        'bairro',
        'cidade'

    ];
    public function status()
    {
        return $this->belongsTo(Status::class, 'id' );
    }
}
