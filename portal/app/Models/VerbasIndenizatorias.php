<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerbasIndenizatorias extends Model
{
    protected $table = "verbas_indenizatorias";

    protected $fillable = [
        'id_deputado', 'valor', 'cod_tipo_despesa', 'desc_tipo_despesa', 'mes_reembolso', 'ano_reembolso',
    ];


}
