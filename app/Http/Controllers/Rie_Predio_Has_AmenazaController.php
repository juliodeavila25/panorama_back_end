<?php

namespace App\Http\Controllers;
use App\Models\Rie_Predio_Has_Amenaza;
use Illuminate\Http\Request;
use Validator;

class Rie_Predio_Has_AmenazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Rie_Predio_Has_Amenaza::all();
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
            "ID_AMENAZA"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $rie_predio_has_amenaza = new Rie_Predio_Has_Amenaza;
            $rie_predio_has_amenaza->ID_PREDIO=$request->ID_PREDIO;
            $rie_predio_has_amenaza->ID_AMENAZA=$request->ID_AMENAZA;
            $result=$rie_predio_has_amenaza->save();
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
