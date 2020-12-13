<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $fillable = [
        'id',
        'pergunta'
    ];

    public function repostas() {
        return $this->hasMany(Resposta::class, 'pergunta_id');
    }
}
