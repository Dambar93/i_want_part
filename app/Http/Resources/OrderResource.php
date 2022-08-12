<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'unique_id' => $this-> unique_id,
            'email' => $this-> email,
            'status' => $this-> status,
            'address' => $this-> address,
            'order_items' => OrderItemResource::collection($this-> items),
            

        ];
    }
}
