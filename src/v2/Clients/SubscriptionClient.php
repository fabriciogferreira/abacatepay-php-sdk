<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\Body\Subscription\SubscriptionCreateBody;
use AbacatePay\v2\Responses\Subscription\SubscriptionCreateResponse;

class SubscriptionClient
{
  public function __construct(
    private AbacatePayClient $abacatePayClient
  ) {}

  public function create(
    SubscriptionCreateBody $subscriptionCreateBody
  ): SubscriptionCreateResponse {
    $data = $this->abacatePayClient->post(
      'subscriptions/create',
      [
        'json' => $subscriptionCreateBody->toArray(),
      ]
    );

    return SubscriptionCreateResponse::fromArray($data);
  }
}
