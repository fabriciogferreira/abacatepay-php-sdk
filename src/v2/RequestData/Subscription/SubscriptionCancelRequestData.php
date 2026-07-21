<?php

namespace AbacatePay\v2\RequestData\Subscription;

use AbacatePay\v2\RequestData\RequestData;

class SubscriptionCancelRequestData extends RequestData
{
  private string $id;

  public static function make(
    string $id,
  ): self {
    $subscriptionCancelRequestData = new self();

    $subscriptionCancelRequestData->id = $id;

    return $subscriptionCancelRequestData;
  }

  /**
   * @return array<string, mixed>
   */
  public function toArray(): array
  {
    return [
      'id' => $this->id,
    ];
  }
}
