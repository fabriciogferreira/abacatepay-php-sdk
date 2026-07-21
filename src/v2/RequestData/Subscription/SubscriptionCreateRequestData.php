<?php

namespace AbacatePay\v2\RequestData\Subscription;

use AbacatePay\v2\RequestData\Item;
use AbacatePay\v2\RequestData\RequestData;
use AbacatePay\v2\Enums\SubscriptionMethodEnum;
class SubscriptionCreateRequestData extends RequestData
{
  /** @var list<Item> */
  private array $items;

  /** @var list<SubscriptionMethodEnum>|null */
  private ?array $methods = null;

  private ?string $returnUrl = null;
  private ?string $completionUrl = null;
  private ?string $customerId = null;

  /** @var list<string>|null */
  private ?array $coupons = null;

  private ?string $externalId = null;

  /** @var array<string, mixed>|null */
  private ?array $metadata = null;

  /**
   * @param list<Item> $items
   */
  public static function make(
    array $items,
  ): self {
    $subscriptionCreateRequestData = new self();

    $subscriptionCreateRequestData->items = $items;

    return $subscriptionCreateRequestData;
  }

  /**
   * @param list<SubscriptionMethodEnum> $methods
   */
  public function methods(
    array $methods,
  ): static {
    $this->methods = $methods;

    return $this;
  }

  public function returnUrl(
    string $returnUrl,
  ): static {
    $this->returnUrl = $returnUrl;

    return $this;
  }

  public function completionUrl(
    string $completionUrl,
  ): static {
    $this->completionUrl = $completionUrl;

    return $this;
  }

  public function customerId(
    string $customerId,
  ): static {
    $this->customerId = $customerId;

    return $this;
  }

  /**
   * @param list<string> $coupons
   */
  public function coupons(
    array $coupons,
  ): static {
    $this->coupons = $coupons;

    return $this;
  }

  public function externalId(
    string $externalId,
  ): static {
    $this->externalId = $externalId;

    return $this;
  }

  /**
   * @param array<string, mixed> $metadata
   */
  public function metadata(
    array $metadata,
  ): static {
    $this->metadata = $metadata;

    return $this;
  }

  /**
   * @return array<string, mixed>
   */
  public function toArray(): array
  {
    return array_filter([
      'items' => array_map(
        static fn (Item $item) => $item->toArray(),
        $this->items,
      ),
      'methods' => null !== $this->methods
        ? array_map(
          static fn (SubscriptionMethodEnum $method) => $method->value,
          $this->methods,
        )
        : null,
      'returnUrl' => $this->returnUrl,
      'completionUrl' => $this->completionUrl,
      'customerId' => $this->customerId,
      'coupons' => $this->coupons,
      'externalId' => $this->externalId,
      'metadata' => $this->metadata,
    ], static fn ($value) => null !== $value);
  }
}
