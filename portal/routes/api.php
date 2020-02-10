<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('deputado', 'Api\DeputadoController');


Route::get('deputados/verbasindenizatorias/top5/{mes}', 'Api\DeputadoController@topVerbasDeputados');
Route::get('deputados/topRedesSociaisDeputados', 'Api\DeputadoController@topRedesSociaisDeputados');


