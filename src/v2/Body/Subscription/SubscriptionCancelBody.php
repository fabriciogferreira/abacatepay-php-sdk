<?php

namespace AbacatePay\v2\Body\Subscription;

use AbacatePay\v2\Body\Body;

class SubscriptionCancelBody extends Body
{
  private string $id;

  public static function make(
    string $id,
  ): self {
    $subscriptionCancelBody = new self();

    $subscriptionCancelBody->id = $id;

    return $subscriptionCancelBody;
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
