<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            // 'manufacture' => $this -> manufacture ->name,
            'model' => $this -> model,
            'fuel_type' => $this -> fuel_type,
            'wheel_placement' => $this -> wheel_placement,
            'engine_code' => $this -> engine_code,
            'body_type' => $this -> body_type,
            'color' => $this -> color,
            'year' => $this -> year,
            'engine_displacement' => $this -> engine_displacement,
            'power' => $this -> power,
        ];
    }
}
