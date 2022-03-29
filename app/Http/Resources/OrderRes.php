<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderRes extends JsonResource
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
            'customerId' => $this->customerId,
            'orderDate' => $this->orderDate,
            'orderNumber' => $this->orderNumber,
            'TotalAmount' => $this->TotalAmount,
            'customer' => isset($this->customer) ? $this->customer : null,
        ];
    }
}
