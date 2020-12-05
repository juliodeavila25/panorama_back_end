<?php

namespace App\Http\Controllers;
use App\Models\Rie_Predio_Has_Observaciones;
use Illuminate\Http\Request;
use Validator;

class Rie_Predio_Has_ObservacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Rie_Predio_Has_Observaciones::all();
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
            "ID_OBSERVACION"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $rie_predio_has_observaciones = new Rie_Predio_Has_Observaciones;
            $rie_predio_has_observaciones->ID_PREDIO=$request->ID_PREDIO;
            $rie_predio_has_observaciones->ID_OBSERVACION=$request->ID_OBSERVACION;
            $result=$rie_predio_has_observaciones->save();
            if($result){
                return ["Result"=>"Registro guardado."];
            }else{
                return ["Result"=>"Regisro fallo."];
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
