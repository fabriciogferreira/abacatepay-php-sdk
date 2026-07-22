<?php

namespace AbacatePay\v2\ResponseBody\Subscription;

use AbacatePay\v2\ResponseBody\ResponseBody;
use AbacatePay\v2\ResponseData\Subscription\SubscriptionCreateResponseData;

final class SubscriptionCreateResponseBody extends ResponseBody
{
  public readonly SubscriptionCreateResponseData $data;

  /**
   * @param array<string, mixed> $body
   */
  public function __construct(array $body = [])
  {
    parent::__construct($body);

    $this->data = SubscriptionCreateResponseData::fromArray($body['data']);
  }
}
