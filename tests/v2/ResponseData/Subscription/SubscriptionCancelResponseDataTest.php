<?php

use AbacatePay\v2\ResponseData\Subscription\SubscriptionCancelResponseData;

$expected = [
  'id' => 'subs_abc123xyz',
  'customerId' => 'cust_abc123xyz',
  'amount' => 2990,
  'status' => 'CANCELLED',
  'method' => 'CARD',
  'coupons' => [],
  'devMode' => false,
  'trialDays' => null,
  'trialEndsAt' => null,
  'createdAt' => '2024-12-06T20:00:00.000Z',
  'updatedAt' => '2024-12-06T20:00:05.000Z',
];

/**
 * @param array<string, mixed> $expected
 */
function assertSubscriptionCancelResponseData(
  SubscriptionCancelResponseData $subscriptionCancelResponseData,
  array $expected,
): void {
  it('should return the correct response', function () use ($subscriptionCancelResponseData, $expected) {
    expect($subscriptionCancelResponseData)->toBeInstanceOf(SubscriptionCancelResponseData::class);
    expect($subscriptionCancelResponseData->id)->toBe($expected['id']);
    expect($subscriptionCancelResponseData->customerId)->toBe($expected['customerId']);
    expect($subscriptionCancelResponseData->amount)->toBe($expected['amount']);
    expect($subscriptionCancelResponseData->status)->toBe($expected['status']);
    expect($subscriptionCancelResponseData->method)->toBe($expected['method']);
    expect($subscriptionCancelResponseData->coupons)->toBe($expected['coupons']);
    expect($subscriptionCancelResponseData->devMode)->toBe($expected['devMode']);
    expect($subscriptionCancelResponseData->trialDays)->toBe($expected['trialDays']);
    expect($subscriptionCancelResponseData->trialEndsAt)->toBe($expected['trialEndsAt']);
    expect($subscriptionCancelResponseData->createdAt)->toBe($expected['createdAt']);
    expect($subscriptionCancelResponseData->updatedAt)->toBe($expected['updatedAt']);
  });
}

assertSubscriptionCancelResponseData(
  SubscriptionCancelResponseData::fromArray($expected),
  $expected,
);
