<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Andamento extends Model
{
    protected $fillable = ['data', 'detalhes', 'estudante_id', 'status_id'];

    public function estudantes()
    {
        return $this->belongsTo(Estudante::class, 'estudante_id' );
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id' );
    }
}
