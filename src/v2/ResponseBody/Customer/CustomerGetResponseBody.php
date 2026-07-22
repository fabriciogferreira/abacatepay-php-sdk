<?php

namespace AbacatePay\v2\ResponseBody\Customer;

use AbacatePay\v2\ResponseBody\ResponseBody;
use AbacatePay\v2\ResponseData\Customer\CustomerGetResponseData;

final class CustomerGetResponseBody extends ResponseBody
{
  public readonly CustomerGetResponseData $data;

  /**
   * @param array<string, mixed> $body
   */
  public function __construct(array $body = [])
  {
    parent::__construct($body);

    $this->data = CustomerGetResponseData::fromArray($body['data']);
  }
}
