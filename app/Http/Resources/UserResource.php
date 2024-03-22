<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['projects'] = ProjectResource::collection($this->whenLoaded('projects'));
        $data['tasks'] = TaskResource::collection($this->whenLoaded('tasks'));
        return $data;
    }
}