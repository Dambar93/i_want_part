<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,           
            'comment'=>$this->comment,
            'part_code'=>$this->part_code,
            'condition' => $this->condition,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category' => $this-> category -> name,
            'manufacture' => $this-> manufacture -> name,
            'images' => PictureResource::collection($this->pictures),
            'other_codes' => CodesResource::collection($this->codes),
            'car' => $this -> car,           
        ];
    }
}
