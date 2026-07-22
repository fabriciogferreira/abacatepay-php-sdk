<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\RequestData\Customer\CustomerGetRequestData;
use AbacatePay\v2\ResponseBody\Customer\CustomerGetResponseBody;
use AbacatePay\v2\RequestData\Customer\CustomerCreateRequestData;
use AbacatePay\v2\RequestData\Customer\CustomerDeleteRequestData;
use AbacatePay\v2\ResponseBody\Customer\CustomerCreateResponseBody;
use AbacatePay\v2\ResponseBody\Customer\CustomerDeleteResponseBody;

class CustomerClient
{
  public function __construct(
    private AbacatePayClient $abacatePayClient
  ) {}

  public function create(
    CustomerCreateRequestData $customerCreateRequestData
  ): CustomerCreateResponseBody {
    $body = $this->abacatePayClient->post(
      'customers/create',
      [
        'json' => $customerCreateRequestData->toArray(),
      ]
    );

    return new CustomerCreateResponseBody($body);
  }

  public function get(
    CustomerGetRequestData $customerGetRequestData
  ): CustomerGetResponseBody {
    $body = $this->abacatePayClient->get(
      'customers/get' . $customerGetRequestData->toQueryString(),
    );

    return new CustomerGetResponseBody($body);
  }

  public function delete(
    CustomerDeleteRequestData $customerDeleteRequestData
  ): CustomerDeleteResponseBody {
    $body = $this->abacatePayClient->post(
      'customers/delete' . $customerDeleteRequestData->toQueryString(),
    );

    return new CustomerDeleteResponseBody($body);
  }
}
