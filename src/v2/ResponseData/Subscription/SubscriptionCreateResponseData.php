<?php

namespace AbacatePay\v2\ResponseData\Subscription;

use AbacatePay\v2\Models\Item;
use AbacatePay\v2\Models\Fine;
use AbacatePay\v2\Models\Interest;

class SubscriptionCreateResponseData
{
  /**
   * @param list<Item> $items
   * @param list<string> $coupons
   * @param null|array<string, mixed> $metadata
   */
  private function __construct(
    public readonly string $id,
    public readonly ?string $externalId,
    public readonly string $url,
    public readonly int $amount,
    public readonly ?int $paidAmount,
    public readonly array $items,
    public readonly string $status,
    public readonly array $coupons,
    public readonly bool $devMode,
    public readonly ?string $customerId,
    public readonly ?string $returnUrl,
    public readonly ?string $completionUrl,
    public readonly ?string $receiptUrl,
    public readonly ?string $upSellProductId,
    public readonly ?int $installmentsCount,
    public readonly ?Interest $interest,
    public readonly ?Fine $fine,
    public readonly ?array $metadata,
    public readonly string $createdAt,
    public readonly string $updatedAt,
  ) {}

  /**
   * @param array<string, mixed> $data
   */
  public static function fromArray(array $data): self
  {
    return new self(
      id: $data['id'],
      externalId: $data['externalId'] ?? null,
      url: $data['url'],
      amount: $data['amount'],
      paidAmount: $data['paidAmount'] ?? null,
      items: array_map(
        static fn (array $item) => Item::fromArray($item),
        $data['items'],
      ),
      status: $data['status'],
      coupons: $data['coupons'],
      devMode: $data['devMode'],
      customerId: $data['customerId'] ?? null,
      returnUrl: $data['returnUrl'] ?? null,
      completionUrl: $data['completionUrl'] ?? null,
      receiptUrl: $data['receiptUrl'] ?? null,
      upSellProductId: $data['upSellProductId'] ?? null,
      installmentsCount: $data['installmentsCount'] ?? null,
      interest: isset($data['interest'])
        ? Interest::fromArray($data['interest'])
        : null,
      fine: isset($data['fine'])
        ? Fine::fromArray($data['fine'])
        : null,
      metadata: $data['metadata'] ?? null,
      createdAt: $data['createdAt'],
      updatedAt: $data['updatedAt'],
    );
  }
}
