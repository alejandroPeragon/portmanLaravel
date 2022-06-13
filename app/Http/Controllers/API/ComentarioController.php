<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComentarioResource;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        return ComentarioResource::collection(Comentario::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Comentario = json_decode($request->getContent(), true);
        $Comentario = Comentario::create($Comentario);
        return new ComentarioResource($Comentario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentario  $Comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $Comentario)
    {
        return new ComentarioResource($Comentario);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentario  $Comentario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentario $Comentario)
    {
        $ComentarioData = json_decode($request->getContent(), true);
        $Comentario->update($ComentarioData);

        return new ComentarioResource($Comentario);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $Comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $Comentario)
    {
        $Comentario->delete();
    }
}
