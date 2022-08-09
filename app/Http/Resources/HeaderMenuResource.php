<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeaderMenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $parent = null;
        if (!is_null($a = self::where('id', $this->id_parent)->first())) {
            $parent =  $a->nama_menu;
        }
        return [
            'id' => $this->id,
            'id_parent' => $this->id_parent,
            'parent' => $parent,
            'nama_menu' => $this->nama_menu,
            'order_menu' => $this->order_menu,
            'link' => $this->link,
            'status' => $this->status,
        ];
    }
}
