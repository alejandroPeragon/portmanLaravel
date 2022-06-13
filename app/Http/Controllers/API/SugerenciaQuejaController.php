<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SugerenciaQueja;
use App\Http\Resources\SugerenciaQuejaResource;
use Illuminate\Http\Request;

class SugerenciaQuejaController extends Controller
{
    public function index()
    {
        return SugerenciaQuejaResource::collection(SugerenciaQueja::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre'=> 'required',
            'Apellidos'=> 'required',
            'email'=> 'required|email',
            'Contenido'=> 'required',
        ]);
        $SugerenciaQueja = json_decode($request->getContent(), true);
        $SugerenciaQueja = SugerenciaQueja::create($SugerenciaQueja);
        return new SugerenciaQuejaResource($SugerenciaQueja);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SugerenciaQueja  $SugerenciaQueja
     * @return \Illuminate\Http\Response
     */
    public function show(SugerenciaQueja $SugerenciaQueja)
    {
        return new SugerenciaQuejaResource($SugerenciaQueja);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SugerenciaQueja  $SugerenciaQueja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SugerenciaQueja $SugerenciaQueja)
    {
        $SugerenciaQuejaData = json_decode($request->getContent(), true);
        $SugerenciaQueja->update($SugerenciaQuejaData);

        return new SugerenciaQuejaResource($SugerenciaQueja);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SugerenciaQueja  $SugerenciaQueja
     * @return \Illuminate\Http\Response
     */
    public function destroy(SugerenciaQueja $SugerenciaQueja)
    {
        $SugerenciaQueja->delete();
    }
}
