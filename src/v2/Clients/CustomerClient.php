<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\Body\Customer\CustomerCreateBody;
use AbacatePay\v2\Body\Customer\CustomerDeleteBody;
use AbacatePay\v2\Responses\Customer\CustomerCreateResponse;
use AbacatePay\v2\Responses\Customer\CustomerDeleteResponse;

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

  public function delete(
    CustomerDeleteBody $customerDeleteBody
  ): CustomerDeleteResponse {
    $data = $this->abacatePayClient->post(
      'customers/delete' . $customerDeleteBody->toQueryString(),
    );

    return CustomerDeleteResponse::fromArray($data);
  }
}
