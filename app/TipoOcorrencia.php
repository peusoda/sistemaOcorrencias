<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOcorrencia extends Model
{
	protected $table = "tipo_ocorrencia";

    protected $fillable = [
    	'id',
    	'descricao',
    	'nivel',
    ];
}
