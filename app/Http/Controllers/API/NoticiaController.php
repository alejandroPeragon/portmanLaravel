<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoticiaResource;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        return NoticiaResource::collection(Noticia::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->authorize('create', Noticia::class);
        $request->validate([
            'titulo' => 'required',
            'descripcion'=> 'required',
            'descripcionCorta'=> 'required',
            'image' => 'required',
        ]);
        $Noticia = json_decode($request->getContent(), true);
        $Noticia = Noticia::create($Noticia);
        return new NoticiaResource($Noticia);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $Noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $Noticia)
    {
        return new NoticiaResource($Noticia);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $Noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $Noticia)
    {
        $this->authorize('update', Noticia::class);
        $NoticiaData = json_decode($request->getContent(), true);
        $Noticia->update($NoticiaData);

        return new NoticiaResource($Noticia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $Noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $Noticia)
    {
        $this->authorize('delete', Noticia::class);
        $Noticia->delete();
    }
}
