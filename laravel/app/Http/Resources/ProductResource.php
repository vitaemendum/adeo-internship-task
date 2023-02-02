<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'sku' => $this->getID(),
            'name' => $this->name,
            'price' => $this->price,
            'for_weather_forecasts' => $this->for_weather_forecasts,
        ];
    }

    private function getID()
    {
        return sprintf('UM-%d', $this->sku);
    }
}
