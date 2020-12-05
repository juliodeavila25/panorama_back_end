<?php

namespace App\Http\Controllers;
use App\Models\Usos_Geo_Predios;
use Illuminate\Http\Request;
use Validator;

class Usos_Geo_PrediosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Usos_Geo_Predios::all();
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
        $rules = array(
            "REFCATASTRAL"=>"required",
            "DIRECCION"=>"required",
            "ID_BARRIO"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $usos_geo_predios = new Usos_Geo_Predios;
            $usos_geo_predios->REFCATASTRAL=$request->REFCATASTRAL;
            $usos_geo_predios->DIRECCION=$request->DIRECCION;
            $usos_geo_predios->ID_BARRIO=$request->ID_BARRIO;
            $result=$usos_geo_predios->save();
            if($result){
                return ["Result"=>"Usos Geo Predios ha sigo guardada."];
            }else{
                return ["Result"=>"La creación ha fallado."];
            }
        }
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
        return Usos_Geo_Predios::find($id);
    }

     /**
     * Display the specified resource by search.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name){
        return Usos_Geo_Predios::where("REFCATASTRAL",$name)->get();
    }

    /**
     * Display the specified resource by search like.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchLike($name){
        return Usos_Geo_Predios::where("REFCATASTRAL","like","%".$name."%")->get();
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
        $usos_geo_predios = Usos_Geo_Predios::find($id);
        $usos_geo_predios->REFCATASTRAL=$request->REFCATASTRAL;
        $usos_geo_predios->DIRECCION=$request->DIRECCION;
        $usos_geo_predios->ID_BARRIO=$request->ID_BARRIO;
        $result=$usos_geo_predios->save();
         if($result){
             return ["Result"=>"Los datos han sido actualizados."];
         }else{
             return ["Result"=>"La operacion ha fallado."];
         }
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
        $usos_geo_predios = Usos_Geo_Predios::find($id);
        $result=$usos_geo_predios->delete();
        if($result){
            return ["Result"=>"Los datos han sido eliminados."];
        }else{
            return ["Result"=>"La operacion ha fallado."];
        }
    }
}
