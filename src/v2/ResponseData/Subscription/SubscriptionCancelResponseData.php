<?php

namespace AbacatePay\v2\ResponseData\Subscription;

class SubscriptionCancelResponseData
{
  /**
   * @param list<string> $coupons
   */
  private function __construct(
    public readonly string $id,
    public readonly ?string $customerId,
    public readonly int $amount,
    public readonly string $status,
    public readonly string $method,
    public readonly array $coupons,
    public readonly bool $devMode,
    public readonly ?int $trialDays,
    public readonly ?string $trialEndsAt,
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
      customerId: $data['customerId'] ?? null,
      amount: $data['amount'],
      status: $data['status'],
      method: $data['method'],
      coupons: $data['coupons'],
      devMode: $data['devMode'],
      trialDays: $data['trialDays'] ?? null,
      trialEndsAt: $data['trialEndsAt'] ?? null,
      createdAt: $data['createdAt'],
      updatedAt: $data['updatedAt'],
    );
  }
}
