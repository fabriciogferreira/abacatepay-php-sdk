<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\Body\Customer\CustomerCreateBody;
use AbacatePay\v2\Responses\Customer\CustomerCreateResponse;

class CustomerClient
{
  public function __construct(
    private AbacatePayClient $abacatePayClient
  ) {}

  public function create(
    CustomerCreateBody $customerCreateBody
  ): CustomerCreateResponse {
    $data = $this->abacatePayClient->post(
      'customers/create',
      [
        'json' => $customerCreateBody->toArray(),
      ]
    );

    return CustomerCreateResponse::fromArray($data);
  }
}
