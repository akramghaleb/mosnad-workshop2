<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id' =>$this->id,
            'name' => $this->name,
            'description' =>$this->description,
            'address' =>$this->address,
            'author' =>$this->author,
            'year' =>$this->year,
            'isbn' =>$this->isbn,
            'status' =>$this->status,
        ];
    }
}
