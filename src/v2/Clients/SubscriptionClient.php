<?php

namespace AbacatePay\v2\Clients;

use AbacatePay\v2\RequestData\Subscription\SubscriptionCreateRequestData;
use AbacatePay\v2\RequestData\Subscription\SubscriptionCancelRequestData;
use AbacatePay\v2\ResponseData\Subscription\SubscriptionCancelResponseData;
use AbacatePay\v2\ResponseData\Subscription\SubscriptionCreateResponseData;

class SubscriptionClient
{
  public function __construct(
    private AbacatePayClient $abacatePayClient
  ) {}

  public function create(
    SubscriptionCreateRequestData $subscriptionCreateRequestData
  ): SubscriptionCreateResponseData {
    $data = $this->abacatePayClient->post(
      'subscriptions/create',
      [
        'json' => $subscriptionCreateRequestData->toArray(),
      ]
    );

    return SubscriptionCreateResponseData::fromArray($data);
  }

  public function cancel(
    SubscriptionCancelRequestData $subscriptionCancelRequestData
  ): SubscriptionCancelResponseData {
    $data = $this->abacatePayClient->post(
      'subscriptions/cancel',
      [
        'json' => $subscriptionCancelRequestData->toArray(),
      ]
    );

    return SubscriptionCancelResponseData::fromArray($data);
  }
}
