<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $fillable = [
        'nomeAluno', 'responsavel', 'naturalidade', 'telefone'
    ];
}