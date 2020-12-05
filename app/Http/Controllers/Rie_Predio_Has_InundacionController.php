<?php

namespace App\Http\Controllers;
use App\Models\Rie_Predio_Has_Inundacion;
use Illuminate\Http\Request;
use Validator;


class Rie_Predio_Has_InundacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Rie_Predio_Has_Inundacion::all();
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
            "ID_INUNDACION"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $rie_predio_has_inundacion = new Rie_Predio_Has_Inundacion;
            $rie_predio_has_inundacion->ID_PREDIO=$request->ID_PREDIO;
            $rie_predio_has_inundacion->ID_INUNDACION=$request->ID_INUNDACION;
            $result=$rie_predio_has_inundacion->save();
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
