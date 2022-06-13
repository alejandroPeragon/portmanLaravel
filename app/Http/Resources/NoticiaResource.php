<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoticiaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'Titulo' => $this->titulo,
            'Descripcion' => $this->descripcion,
            'DescripcionCorta' => $this->descripcionCorta,
            'imagen' => $this->image,
            'CreacionNoticia' => $this->created_at,
            'remember_token' => $this->remember_token,
            'Comentarios' =>ComentarioResource::collection($this->comentario)
        ];
    }
}
