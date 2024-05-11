<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray($request): array {
    return [
      'id'          => $this->id,
      'title'       => $this->title,
      'description' => $this->description ?? '',
      'image'       => $this->image,
    ];
  }
}
