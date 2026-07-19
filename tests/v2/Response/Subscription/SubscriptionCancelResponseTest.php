<?php

use AbacatePay\v2\Responses\Subscription\SubscriptionCancelResponse;

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
function assertSubscriptionCancelResponse(
  SubscriptionCancelResponse $subscriptionCancelResponse,
  array $expected,
): void {
  it('should return the correct response', function () use ($subscriptionCancelResponse, $expected) {
    expect($subscriptionCancelResponse)->toBeInstanceOf(SubscriptionCancelResponse::class);
    expect($subscriptionCancelResponse->id)->toBe($expected['id']);
    expect($subscriptionCancelResponse->customerId)->toBe($expected['customerId']);
    expect($subscriptionCancelResponse->amount)->toBe($expected['amount']);
    expect($subscriptionCancelResponse->status)->toBe($expected['status']);
    expect($subscriptionCancelResponse->method)->toBe($expected['method']);
    expect($subscriptionCancelResponse->coupons)->toBe($expected['coupons']);
    expect($subscriptionCancelResponse->devMode)->toBe($expected['devMode']);
    expect($subscriptionCancelResponse->trialDays)->toBe($expected['trialDays']);
    expect($subscriptionCancelResponse->trialEndsAt)->toBe($expected['trialEndsAt']);
    expect($subscriptionCancelResponse->createdAt)->toBe($expected['createdAt']);
    expect($subscriptionCancelResponse->updatedAt)->toBe($expected['updatedAt']);
  });
}

assertSubscriptionCancelResponse(
  SubscriptionCancelResponse::fromArray($expected),
  $expected,
);
