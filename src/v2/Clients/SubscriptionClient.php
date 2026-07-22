<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\RequestData\Subscription\SubscriptionCreateRequestData;
use AbacatePay\v2\RequestData\Subscription\SubscriptionCancelRequestData;
use AbacatePay\v2\ResponseBody\Subscription\SubscriptionCancelResponseBody;
use AbacatePay\v2\ResponseBody\Subscription\SubscriptionCreateResponseBody;

class SubscriptionClient
{
  public function __construct(
    private AbacatePayClient $abacatePayClient
  ) {}

  public function create(
    SubscriptionCreateRequestData $subscriptionCreateRequestData
  ): SubscriptionCreateResponseBody {
    $body = $this->abacatePayClient->post(
      'subscriptions/create',
      [
        'json' => $subscriptionCreateRequestData->toArray(),
      ]
    );

    return new SubscriptionCreateResponseBody($body);
  }

  public function cancel(
    SubscriptionCancelRequestData $subscriptionCancelRequestData
  ): SubscriptionCancelResponseBody {
    $body = $this->abacatePayClient->post(
      'subscriptions/cancel',
      [
        'json' => $subscriptionCancelRequestData->toArray(),
      ]
    );

    return new SubscriptionCancelResponseBody($body);
  }
}
