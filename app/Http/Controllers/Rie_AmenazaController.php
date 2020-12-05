<?php

namespace App\Http\Controllers;
use App\Models\Rie_Amenaza;
use Illuminate\Http\Request;
use Validator;

class Rie_AmenazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Rie_Amenaza::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            "AMENAZA"=>"required"
        );
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),401);
        }
        else {
            $rie_amenaza = new Rie_Amenaza;
            $rie_amenaza->AMENAZA=$request->AMENAZA;
            $result=$rie_amenaza->save();
            if($result){
                return ["Result"=>"La amenaza ha sigo guardada."];
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
        return Rie_Amenaza::find($id);
    }

    /**
     * Display the specified resource by search.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($name){
        return Rie_Amenaza::where("AMENAZA",$name)->get();
    }

    /**
     * Display the specified resource by search like.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchLike($name){
        return Rie_Amenaza::where("AMENAZA","like","%".$name."%")->get();
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
        $rie_amenaza = Rie_Amenaza::find($id);
        $rie_amenaza->AMENAZA=$request->AMENAZA;
        $result=$rie_amenaza->save();
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
        $rie_amenaza = Rie_Amenaza::find($id);
        $result=$rie_amenaza->delete();
        if($result){
            return ["Result"=>"Los datos han sido eliminados."];
        }else{
            return ["Result"=>"La operacion ha fallado."];
        }
    }
}
