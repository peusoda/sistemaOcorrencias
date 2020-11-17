<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'email',
        'contato_1',
        'contato_2'
    ];
}
