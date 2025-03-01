<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'codigo' => $this->codigo,
            'descricao' => $this->descricao->name,
            'comprimento' => $this->comp,
            'imagem' => $this->img === null ? 'semImg.jpeg' : $this->img,
            'referencias' => ReferenciaResource::collection($this->referencias),
            'aplicacoes' => AplicacaoResource::collection($this->aplicacoes),
        ];
    }
}
