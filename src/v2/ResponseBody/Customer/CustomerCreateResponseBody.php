<?php

namespace AbacatePay\v2\ResponseBody\Customer;

use AbacatePay\v2\ResponseBody\ResponseBody;
use AbacatePay\v2\ResponseData\Customer\CustomerCreateResponseData;

final class CustomerCreateResponseBody extends ResponseBody
{
  public readonly CustomerCreateResponseData $data;

  /**
   * @param array<string, mixed> $body
   */
  public function __construct(array $body = [])
  {
    parent::__construct($body);

    $this->data = CustomerCreateResponseData::fromArray($body['data']);
  }
}
