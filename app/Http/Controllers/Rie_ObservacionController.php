<?php

namespace App\Http\Controllers;
use App\Models\Rie_Observacion;
use Illuminate\Http\Request;
use Validator;

class Rie_ObservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Rie_Observacion::all();
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
            "OBSERVACION"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $rie_observacion = new Rie_Observacion;
            $rie_observacion->OBSERVACION=$request->OBSERVACION;
            $result=$rie_observacion->save();
            if($result){
                return ["Result"=>"La observacion ha sigo guardada."];
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
        return Rie_Observacion::find($id);
    }

    /**
     * Display the specified resource by search.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name){
        return Rie_Observacion::where("OBSERVACION",$name)->get();
    }

    /**
     * Display the specified resource by search like.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchLike($name){
        return Rie_Observacion::where("OBSERVACION","like","%".$name."%")->get();
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
        $rie_observacion = Rie_Observacion::find($id);
        $rie_observacion->OBSERVACION=$request->OBSERVACION;
        $result=$rie_observacion->save();
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
        $rie_observacion = Rie_Observacion::find($id);
        $result=$rie_observacion->delete();
        if($result){
            return ["Result"=>"Los datos han sido eliminados."];
        }else{
            return ["Result"=>"La operacion ha fallado."];
        }
    }
}
