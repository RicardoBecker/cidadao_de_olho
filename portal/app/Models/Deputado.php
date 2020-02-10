<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_deputado';

    protected $fillable = [
        'id_deputado', 'nome', 'partido',
    ];

    public function deputadoredesocial()
    {
        return $this->hasMany('App\Models\DeputadoRedeSocial' , 'id_deputado');
    }
}
