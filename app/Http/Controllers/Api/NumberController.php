<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveNumberRequest;
use App\Http\Requests\UpdateNumberRequest;
use App\Http\Resources\NumberResource;
use Illuminate\Http\Request;
use App\Models\Numberwht;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class NumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NumberResource::collection(Numberwht::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveNumberRequest $request)
    {
        
        return (New NumberResource(Numberwht::create($request->all())))
        ->additional(['msg' => 'numero creado correctamente']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Numberwht $numberwth)
    {
       
        return new NumberResource($numberwth);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNumberRequest $request, Numberwht $numberwht)
    {
        
        /* $numberwht->update($request->all());
        return response()->json([
            'res' => true,
            'mensaje' => 'Paciente actualizado correctamente'
        ],200); */
    
      /*   $numberwht=Numberwht::find($request->id);
        $numberwht->number= $request->number;
        $numberwht->status= $request->status;
        $result = $numberwht->save();
        if ($result) {
            return ["result"=>"blog update"];
        } else {
            return ["result"=>"blog not update"];
        } */

        $numberwht->update($request->all());

        return (new NumberResource($numberwht))
        ->additional(['msg' => 'numero actualizado correctamente'])
        ->response()
        ->setStatusCode(202);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Numberwht $numberwht)
    {
        
        /* return response()->json([
            'res' => true,
            'mensaje' => 'Numero eliminado correctamente'
        ],200); */

        $numberwht->delete();
        return (new NumberResource($numberwht))
        ->additional(['msg' => 'numero eliminado correctamente']);
    }
    public function pruebas()
    {
        $usuarios = DB::table('numeroswth')->where('status','LIKE','No')->pluck('number','status')->first();
        return $usuarios;
    }
}
