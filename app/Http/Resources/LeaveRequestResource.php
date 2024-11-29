<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $leave_request = parent::toArray($request);
        return array_merge($leave_request, [
            'user' => new UserResource($this->user),
        ]);
        // return [
        //     'id' => $this->id,
        //     'user_id' => $this->user_id,
        // ];
    }
}
