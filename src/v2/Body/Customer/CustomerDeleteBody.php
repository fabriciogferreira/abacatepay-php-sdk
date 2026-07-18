<?php

namespace AbacatePay\v2\Body\Customer;

use AbacatePay\v2\Body\Body;

class CustomerDeleteBody extends Body
{
  private string $id;

  public static function make(
    string $id,
  ): self {
    $customerCreateBody = new self();

    $customerCreateBody->id = $id;

    return $customerCreateBody;
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
