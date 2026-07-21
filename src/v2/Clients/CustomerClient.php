<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\RequestData\Customer\CustomerGetRequestData;
use AbacatePay\v2\ResponseData\Customer\CustomerGetResponseData;
use AbacatePay\v2\RequestData\Customer\CustomerCreateRequestData;
use AbacatePay\v2\RequestData\Customer\CustomerDeleteRequestData;
use AbacatePay\v2\ResponseData\Customer\CustomerCreateResponseData;
use AbacatePay\v2\ResponseData\Customer\CustomerDeleteResponseData;

class CustomerClient
{
  public function __construct(
    private AbacatePayClient $abacatePayClient
  ) {}

  public function create(
    CustomerCreateRequestData $customerCreateRequestData
  ): CustomerCreateResponseData {
    $data = $this->abacatePayClient->post(
      'customers/create',
      [
        'json' => $customerCreateRequestData->toArray(),
      ]
    );

    return CustomerCreateResponseData::fromArray($data);
  }

  public function get(
    CustomerGetRequestData $customerGetRequestData
  ): CustomerGetResponseData {
    $data = $this->abacatePayClient->get(
      'customers/get' . $customerGetRequestData->toQueryString(),
    );

    return CustomerGetResponseData::fromArray($data);
  }

  public function delete(
    CustomerDeleteRequestData $customerDeleteRequestData
  ): CustomerDeleteResponseData {
    $data = $this->abacatePayClient->post(
      'customers/delete' . $customerDeleteRequestData->toQueryString(),
    );

    return CustomerDeleteResponseData::fromArray($data);
  }
}
