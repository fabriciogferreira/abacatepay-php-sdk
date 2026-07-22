<?php

namespace AbacatePay\v2\ResponseBody\Customer;

use AbacatePay\v2\ResponseBody\ResponseBody;
use AbacatePay\v2\ResponseData\Customer\CustomerDeleteResponseData;

final class CustomerDeleteResponseBody extends ResponseBody
{
  public readonly CustomerDeleteResponseData $data;

  /**
   * @param array<string, mixed> $body
   */
  public function __construct(array $body = [])
  {
    parent::__construct($body);

    $this->data = CustomerDeleteResponseData::fromArray($body['data']);
  }
}
