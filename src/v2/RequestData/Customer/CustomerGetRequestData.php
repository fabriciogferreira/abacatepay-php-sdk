<?php

namespace AbacatePay\v2\RequestData\Customer;

use AbacatePay\v2\RequestData\RequestData;

class CustomerGetRequestData extends RequestData
{
  private string $id;

  public static function make(
    string $id,
  ): self {
    $customerGetRequest = new self();

    $customerGetRequest->id = $id;

    return $customerGetRequest;
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
