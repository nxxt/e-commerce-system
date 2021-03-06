<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'subtotal' => $this->subtotal->formatted(),
            'total' => $this->total()->formatted(),
            'created_at' => $this->created_at->toDateTimeString(),
            'products' => ProductVariationResource::collection($this->whenLoaded('products')),
            'address' => new AddressResource($this->whenLoaded('address')),
            'shippingMethod' => new ShippingMethodResource($this->whenLoaded('shippingMethod'))
        ];
    }
}
