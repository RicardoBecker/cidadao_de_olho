<?php

namespace App\Http\Controllers\Api;

use App\Models\Deputado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DeputadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function topVerbasDeputados(Request $request)
    {
        $mes = $request->mes;

        $sql = DB::table('verbas_indenizatorias')
            ->join('deputados', 'verbas_indenizatorias.id_deputado', '=', 'deputados.id_deputado')
            ->select('verbas_indenizatorias.id_deputado', 'deputados.nome', DB::raw('SUM(verbas_indenizatorias.valor) as total_verbas'))
            ->where('verbas_indenizatorias.mes_reembolso', $mes)
            ->groupBy('verbas_indenizatorias.id_deputado', 'deputados.nome')
            ->orderBy('total_verbas', 'desc')
            ->limit(5)
            ->get();

        return response()->json($sql, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    public function topRedesSociaisDeputados()
    {
        $sql = DB::table('deputado_rede_socials')
            ->select('nome', DB::raw('count(nome) as qtd'))
            ->groupBy('nome')
            ->orderBy('qtd', 'desc')
            ->get();

        return response()->json($sql, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
