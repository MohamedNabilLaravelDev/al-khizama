<?php

namespace App\Http\Resources\Api;

use App\Http\Resources\Api\transferTransactionTipResource;
use App\Traits\PaginationTrait;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionTipCollection extends ResourceCollection {
  use PaginationTrait;

  public function toArray($request) {
    return [
      'pagination' => $this->paginationModel($this),
      'data'       => transferTransactionTipResource::collection($this->collection),
    ];

  }
}
