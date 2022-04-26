<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonResource
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
            'status' => 'success',
            'message' => 'Fetched pokemon details successfully',
            'data' => [    
                'id' => $this->id,
                'identifier' => $this->identifier,
                'species' => [
                    'id' => $this->species->id,
                    'identifier' => $this->species->identifier,
                    'gender_rate' => $this->species->gender_rate,
                    'capture_rate' => $this->species->capture_rate,
                    'base_happiness' => $this->species->base_happiness,
                    'generation' => [
                        'id' => $this->species->generation->id,
                        'identifier' => $this->species->generation->identifier,
                        'region' => [
                            'id' => $this->species->generation->region->id,
                            'identifier' => $this->species->generation->region->identifier,
                        ]
                    ],
                ],
                'color' => [
                    'id' => $this->species->color->id,
                    'identifier' => $this->species->color->identifier,
                ],
                'shape' => [
                    'id' => $this->species->shape->id,
                    'identifier' => $this->species->shape->identifier,
                ],
                'habitat' => [
                    'id' => $this->species->habitat->id,
                    'identifier' => $this->species->habitat->identifier,
                ],
                'height' => $this->height,
                'weight' => $this->weight,
                'base_experience' => $this->base_experience,
                'order' => $this->order,
                'is_default' => $this->is_default,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
