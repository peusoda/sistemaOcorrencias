<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id',
        'ocorrencia_id',
        'image1',
        'image2', 
        'image3'
    ];
}
