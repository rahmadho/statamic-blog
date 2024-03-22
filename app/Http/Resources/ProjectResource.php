<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['user'] = new UserResource($this->whenLoaded('user'));
        $data['tasks'] = TaskResource::collection($this->whenLoaded('tasks'));
        return $data;
    }
}
