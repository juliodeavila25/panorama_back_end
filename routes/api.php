<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usos_DireccionesController;
use App\Http\Controllers\Usos_Geo_PrediosController;
use App\Http\Controllers\Rie_AmenazaController;
use App\Http\Controllers\Rie_Predio_Has_AmenazaController;
use App\Http\Controllers\Rie_InundacionController;
use App\Http\Controllers\Rie_Predio_Has_InundacionController;
use App\Http\Controllers\Rie_ObservacionController;
use App\Http\Controllers\Rie_Predio_Has_ObservacionesController;
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

Route::post('login', 'App\Http\Controllers\ApiController@authenticate');
Route::post('register', 'App\Http\Controllers\ApiController@register');

Route::group(['middleware' => ['jwt.verify','cors']], function() {
Route::get('logout', 'App\Http\Controllers\ApiController@logout');
Route::get('user', 'App\Http\Controllers\ApiController@getAuthUser');
//Rie Uso Direcciones
Route::apiResource("usos_direcciones",Usos_DireccionesController::class);
Route::get("usos_direcciones/search/{name}", [Usos_DireccionesController::class,'search']);
Route::get("usos_direcciones/searchLike/{name}", [Usos_DireccionesController::class,'searchLike']);
//Rie Uso Geo Predios
Route::apiResource("usos_geo_predios",Usos_Geo_PrediosController::class);
Route::get("usos_geo_predios/search/{name}", [Usos_Geo_PrediosController::class,'search']);
Route::get("usos_geo_predios/searchLike/{name}", [Usos_Geo_PrediosController::class,'searchLike']);
//Rie Amenazas
Route::apiResource("rie_amenazas",Rie_AmenazaController::class);
Route::get("rie_amenazas/search/{name}", [Rie_AmenazaController::class,'search']);
Route::get("rie_amenazas/searchLike/{name}", [Rie_AmenazaController::class,'searchLike']);
//Rie Amenazas Has
Route::apiResource("rie_amenazas_has",Rie_Predio_Has_AmenazaController::class);
//Rie Observaciones
Route::apiResource("rie_observaciones",Rie_ObservacionController::class);
Route::get("rie_observaciones/search/{name}", [Rie_ObservacionController::class,'search']);
Route::get("rie_observaciones/searchLike/{name}", [Rie_ObservacionController::class,'searchLike']);
//Rie Observaciones Has
Route::apiResource("rie_observaciones_has",Rie_Predio_Has_ObservacionesController::class);
//Rie Inundacion
Route::apiResource("rie_inundaciones",Rie_InundacionController::class);
Route::get("rie_inundaciones/search/{name}", [Rie_InundacionController::class,'search']);
Route::get("rie_inundaciones/searchLike/{name}", [Rie_InundacionController::class,'searchLike']);
//Rie Inundacion Has
Route::apiResource("rie_inundaciones_has",Rie_Predio_Has_InundacionController::class);
});
