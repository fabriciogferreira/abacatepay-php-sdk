<?php

namespace AbacatePay\v2\RequestData\Customer;

use AbacatePay\v2\RequestData\RequestData;

class CustomerDeleteRequestData extends RequestData
{
  private string $id;

  public static function make(
    string $id,
  ): self {
    $customerCreateRequestData = new self();

    $customerCreateRequestData->id = $id;

    return $customerCreateRequestData;
  }

  public function toQueryString(): string
  {
    $keyValues = [
      'id' => $this->id,
    ];

    $queryString = http_build_query($keyValues);

    return '?' . $queryString;
  }
}
