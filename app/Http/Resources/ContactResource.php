<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'name' => $this->name,
            'phone_no' => $this->phone_no,
            'email' => $this->email,
            'message' => $this->message,
            'preferred_time' => $this->preferred_time,
            'preferred_methods' => $this->preferred_methods
        ];
    }
}
