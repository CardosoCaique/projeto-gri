<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillable = [
        'id',
        'pergunta_id',
        'resposta'
    ];
}
