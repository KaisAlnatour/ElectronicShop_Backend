<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierRes extends JsonResource
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
            'companyName' => $this->companyName,
            'contactName' => $this->contactName,
            'city' => $this->city,
            'country' => $this->country,
            'phone' => $this->phone,
            'fax' => $this->fax,
        ];
    }
}
