<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
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
            'id'        => $this->id,
            'posisi'    => $this->posisi,
            'link'      => $this->link,
            'img'       => $this->img,
            'keterangan' => $this->keterangan,
            'status'    => $this->status,
        ];
    }
}
