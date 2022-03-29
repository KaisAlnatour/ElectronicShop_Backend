<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductRes extends JsonResource
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
            'supplierId' => $this->supplierId,
            'productName' => $this->productName,
            'unitPrice' => $this->unitPrice,
            'supplier' => isset($this->supplier) ? $this->supplier : null,
        ];
    }
}
