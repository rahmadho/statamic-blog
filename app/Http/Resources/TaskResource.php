<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['status_text'] = $this->when($this->status, 'Done', 'OnProgres');
        $data['project'] = new ProjectResource($this->whenLoaded('project'));
        $data['user'] = new UserResource($this->whenLoaded('user'));
        return $data;
    }
}
