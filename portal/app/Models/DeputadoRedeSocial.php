<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeputadoRedeSocial extends Model
{
    protected $primaryKey = 'id_deputado';

    protected $fillable = [
        'id_rede_social', 'id_deputado', 'nome',
    ];

    public function deputado() {
        return $this->belongsTo('App\Models\Deputado', 'id_deputado');
    }

}
