<?php

namespace App\Http\Controllers;
use App\Models\Usos_Direcciones;
use Illuminate\Http\Request;
use Validator;

class Usos_DireccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Usos_Direcciones::all();
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
            "ID_PREDIO"=>"required",
            "DIRECCION_IGAC"=>"required",
            "DIRECCION_STD"=>"required",
            "REVISAR"=>"required",
            "DIRECCION"=>"required",
            "REF_CATASTRAL"=>"required",
            "DESCRIPCION"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $usos_direcciones = new Usos_Direcciones;
            $usos_direcciones->ID_PREDIO=$request->ID_PREDIO;
            $usos_direcciones->DIRECCION_IGAC=$request->DIRECCION_IGAC;
            $usos_direcciones->DIRECCION_STD=$request->DIRECCION_STD;
            $usos_direcciones->REVISAR=$request->REVISAR;
            $usos_direcciones->DIRECCION=$request->DIRECCION;
            $usos_direcciones->REF_CATASTRAL=$request->REF_CATASTRAL;
            $usos_direcciones->DESCRIPCION=$request->DESCRIPCION;
            $result=$usos_direcciones->save();
            if($result){
                return ["Result"=>"Usos Direcciones ha sigo guardada."];
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
        return Usos_Direcciones::find($id);
    }

     /**
     * Display the specified resource by search.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name){
        return Usos_Direcciones::where("DIRECCION",$name)->get();
    }

    /**
     * Display the specified resource by search like.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchLike($name){
        return Usos_Direcciones::where("DIRECCION","like","%".$name."%")->get();
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
         $usos_direcciones = Usos_Direcciones::find($id);
         $usos_direcciones->ID_PREDIO=$request->ID_PREDIO;
         $usos_direcciones->DIRECCION_IGAC=$request->DIRECCION_IGAC;
         $usos_direcciones->DIRECCION_STD=$request->DIRECCION_STD;
         $usos_direcciones->REVISAR=$request->REVISAR;
         $usos_direcciones->DIRECCION=$request->DIRECCION;
         $usos_direcciones->REF_CATASTRAL=$request->REF_CATASTRAL;
         $usos_direcciones->DESCRIPCION=$request->DESCRIPCION;
         $result=$usos_direcciones->save();
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
        $usos_direcciones = Usos_Direcciones::find($id);
        $result=$usos_direcciones->delete();
        if($result){
            return ["Result"=>"Los datos han sido eliminados."];
        }else{
            return ["Result"=>"La operacion ha fallado."];
        }
    }
}
