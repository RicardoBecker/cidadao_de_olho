<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\DeputadoRedeSocial;
use App\Models\VerbasIndenizatorias;
use App\Models\Deputado;

class DeputadoController extends Controller
{
    public function index(){

        $deputados = $this->getDeputados();

        if(!$deputados) {
            return "Não foi possível buscar dados de Deputados";
        }

        $verbas  = $this->getVerbasIndenizatoriasByIdDeputado();

        if(!$verbas) {
            return "Não foi possível buscar dados de Verbas Indenizatórias";
        }

        $redeSocial =  $this->getRedeSocialdeputado();

        if(!$redeSocial) {
            return "Não foi possível buscar dados de Redes Sociais";
        }

        return "Dados Importados";


    }

    public function getDeputados()
    {
        $url = 'http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json';

        // gera um array a partir do json recebido pela url
        $dadosJson = Helper::getJsonFromUrlDecode($url);

        if(is_array($dadosJson))
        {
            foreach ($dadosJson['list'] as $r)
            {
                $id_deputado = Deputado::where('id_deputado', $r['id'])->first()->id_deputado ?? null;

                if(!$id_deputado)
                {
                    // salva os deputados encontrados no banco
                    Deputado::create([
                        'id_deputado' => $r['id'],
                        'nome'        => $r['nome'],
                        'partido'     => $r['partido']
                    ]);
                } //if
            } //foreach

            return true;

        }else{
            return $dadosJson;
        }

    } //getDeputados

    public function getVerbasIndenizatoriasByIdDeputado()
    {
        $ano = '2019';
        $mes = '09';

        $deputados = Deputado::all();

        foreach ($deputados as $deputado)
        {
            $id_deputado = $deputado->id_deputado;

            $url = 'http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/'.$id_deputado.'/'.$ano.'/'.$mes.'?formato=json';

            // gera um array a partir do json recebido pela url
            $dadosJson = Helper::getJsonFromUrlDecode($url);

            if(is_array($dadosJson))
            {
                foreach ($dadosJson['list'] as $r)
                {
                    $codTipoDespesa = VerbasIndenizatorias::where('id_deputado', $id_deputado)
                            ->where('cod_tipo_despesa', $r['codTipoDespesa'])
                            ->where('mes_reembolso', $mes)
                            ->where('ano_reembolso', $ano)
                            ->first()->cod_tipo_despesa ?? null;

                    //dd($codTipoDespesa);

                    if (!$codTipoDespesa)
                    {
                        VerbasIndenizatorias::create([
                            'id_deputado' => $r['idDeputado'],
                            'valor' => $r['valor'],
                            'cod_tipo_despesa' => $r['codTipoDespesa'],
                            'desc_tipo_despesa' => $r['descTipoDespesa'],
                            'mes_reembolso' => $mes,
                            'ano_reembolso' => $ano,
                        ]);
                    }//if
                }//foreach

                return true;
            }//if
            else{
                return $dadosJson;
            }
        }//foreach
    }

    public function getRedeSocialdeputado()
    {
        $url = "http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json";

        $dadosJson = Helper::getJsonFromUrlDecode($url);

        if(is_array($dadosJson))
        {
            foreach ($dadosJson['list'] as $r)
            {
                $id_deputado = $r['id'];

                foreach($r['redesSociais'] as $rs)
                {
                    $idRedeSocial = DeputadoRedeSocial::where('id_deputado', $id_deputado)
                            ->where('id_rede_social', $rs['redeSocial']['id'])
                            ->first()->id_rede_social ?? null;

                    if(!$idRedeSocial){
                        DeputadoRedeSocial::create([
                            'id_rede_social' => $rs['redeSocial']['id'],
                            'nome' => $rs['redeSocial']['nome'],
                            'id_deputado' => $id_deputado,
                        ]);
                    }
                }
            }//foreach

            return true;
        }else{
            return $dadosJson;
        }
    }

}
