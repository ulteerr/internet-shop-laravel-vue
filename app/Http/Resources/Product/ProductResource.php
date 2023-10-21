<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'prev_price' => $this->prev_price,
            'count' => $this->count,
            'preview_image' => $this->imageUrl,
            'is_publiched' => $this->is_publiched,
            'category' => new CategoryResource($this->category),
            'images' => ProductImageResource::collection($this->images),
        ];
    }
}
