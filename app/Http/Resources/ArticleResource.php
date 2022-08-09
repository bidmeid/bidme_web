<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->category) {
            $category =  $this->category->category;
        } else {
            $category = null;
        }
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'body'          => $this->body,
            'category_id'   => $this->category_id,
            'category'      => $category,
            'caption'       => $this->caption,
            'parent'        => $this->parent,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'date'          => date('d F Y', strtotime($this->date)),
            'viewer'        => $this->viewer,
            'img'           => url('assets/images/artikel/' . $this->img),
        ];
    }
}
