<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nomeAluno', 'responsavel', 'naturalidade', 'telefone'
    ];
}