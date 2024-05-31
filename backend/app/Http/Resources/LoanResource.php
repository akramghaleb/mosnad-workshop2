<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            'user' => $this->user,
            'book' =>$this->book,
            'loan_date' =>$this->loan_date,
            'return_date' =>$this->return_date,
            'loan_status' =>$this->loan_status,
        ];
    }
}
