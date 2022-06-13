<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class UserResource extends JsonResource
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
            'Nombre' => $this->name,
            'E-Mail'=> $this->email,
            'Telefono' => $this->telefono,
            'FechaCreacion' => $this->created_at,
            'Admin' => $this->admin
        ];
    }
}
