<?php

namespace App\Http\Resources;

use App\Models\Usuario;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * @var Usuario
     */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'nome' => $this->resource->nome,
            'documento' => $this->resource->documento,
            'email' => $this->resource->email
        ];
    }
}
