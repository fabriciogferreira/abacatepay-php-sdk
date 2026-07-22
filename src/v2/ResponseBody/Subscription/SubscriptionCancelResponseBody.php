<?php

namespace AbacatePay\v2\ResponseBody\Subscription;

use AbacatePay\v2\ResponseBody\ResponseBody;
use AbacatePay\v2\ResponseData\Subscription\SubscriptionCancelResponseData;

final class SubscriptionCancelResponseBody extends ResponseBody
{
  public readonly SubscriptionCancelResponseData $data;

  /**
   * @param array<string, mixed> $body
   */
  public function __construct(array $body = [])
  {
    parent::__construct($body);

    $this->data = SubscriptionCancelResponseData::fromArray($body['data']);
  }
}
