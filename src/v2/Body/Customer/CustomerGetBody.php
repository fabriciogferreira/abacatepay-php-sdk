<?php

namespace AbacatePay\v2\Body\Customer;

use AbacatePay\v2\Body\Body;

class CustomerGetBody extends Body
{
  private string $id;

  public static function make(
    string $id,
  ): self {
    $customerGetBody = new self();

    $customerGetBody->id = $id;

    return $customerGetBody;
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
