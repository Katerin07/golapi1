<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CycleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'school_id' => $this->school_id,
            'grade' => $this->grade,
            $this->mergeWhen($this->relationLoaded('gol'), [
                'gol' => new GolResource($this->gol)
            ]),
        ];
    }
}
