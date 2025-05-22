<?php

namespace App\Http\Resources\Article;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $res = [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'photo' => asset('storage/photos/' . $this->photo),
            'category_id' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'created_at' => $this->created_at,
            'created_at_format' => Carbon::parse($this->created_at)->format('M d, Y')
        ];

        return $res;
    }
}
