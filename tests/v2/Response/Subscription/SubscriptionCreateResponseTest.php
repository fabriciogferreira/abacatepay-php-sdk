<?php

use AbacatePay\v2\Body\Item;
use AbacatePay\v2\Responses\Fine;
use AbacatePay\v2\Responses\Interest;
use AbacatePay\v2\Responses\Subscription\SubscriptionCreateResponse;

$expected = [
  'id' => 'bill_abc123xyz',
  'externalId' => 'subs-123',
  'url' => 'https://app.abacatepay.com/pay/bill_abc123xyz',
  'amount' => 10000,
  'paidAmount' => null,
  'items' => [
    [
      'id' => 'prod_abc123xyz',
      'quantity' => 1,
    ],
  ],
  'status' => 'PENDING',
  'coupons' => ['ABKT10'],
  'devMode' => true,
  'customerId' => 'cust_abc123xyz',
  'returnUrl' => 'https://seusite.com/voltar',
  'completionUrl' => 'https://seusite.com/sucesso',
  'receiptUrl' => null,
  'upSellProductId' => null,
  'installmentsCount' => null,
  'interest' => [
    'value' => 100,
  ],
  'fine' => [
    'value' => 200,
    'type' => 'PERCENTAGE',
  ],
  'metadata' => [
    'origem' => 'app-mobile',
  ],
  'createdAt' => '2024-11-04T18:38:28.573Z',
  'updatedAt' => '2024-11-04T18:38:28.573Z',
];

/**
 * @param array<string, mixed> $expected
 */
function assertSubscriptionCreateResponse(
  SubscriptionCreateResponse $subscriptionCreateResponse,
  array $expected,
): void {
  it('should return the correct response', function () use ($subscriptionCreateResponse, $expected) {
    expect($subscriptionCreateResponse)->toBeInstanceOf(SubscriptionCreateResponse::class);
    expect($subscriptionCreateResponse->id)->toBe($expected['id']);
    expect($subscriptionCreateResponse->externalId)->toBe($expected['externalId']);
    expect($subscriptionCreateResponse->url)->toBe($expected['url']);
    expect($subscriptionCreateResponse->amount)->toBe($expected['amount']);
    expect($subscriptionCreateResponse->paidAmount)->toBe($expected['paidAmount']);
    expect($subscriptionCreateResponse->items)->toHaveCount(count($expected['items']));
    expect($subscriptionCreateResponse->items[0])->toBeInstanceOf(Item::class);
    expect($subscriptionCreateResponse->items[0]->toArray())->toBe($expected['items'][0]);
    expect($subscriptionCreateResponse->status)->toBe($expected['status']);
    expect($subscriptionCreateResponse->coupons)->toBe($expected['coupons']);
    expect($subscriptionCreateResponse->devMode)->toBe($expected['devMode']);
    expect($subscriptionCreateResponse->customerId)->toBe($expected['customerId']);
    expect($subscriptionCreateResponse->returnUrl)->toBe($expected['returnUrl']);
    expect($subscriptionCreateResponse->completionUrl)->toBe($expected['completionUrl']);
    expect($subscriptionCreateResponse->receiptUrl)->toBe($expected['receiptUrl']);
    expect($subscriptionCreateResponse->upSellProductId)->toBe($expected['upSellProductId']);
    expect($subscriptionCreateResponse->installmentsCount)->toBe($expected['installmentsCount']);
    expect($subscriptionCreateResponse->interest)->toBeInstanceOf(Interest::class);
    expect($subscriptionCreateResponse->interest->value)->toBe($expected['interest']['value']);
    expect($subscriptionCreateResponse->fine)->toBeInstanceOf(Fine::class);
    expect($subscriptionCreateResponse->fine->value)->toBe($expected['fine']['value']);
    expect($subscriptionCreateResponse->fine->type)->toBe($expected['fine']['type']);
    expect($subscriptionCreateResponse->metadata)->toBe($expected['metadata']);
    expect($subscriptionCreateResponse->createdAt)->toBe($expected['createdAt']);
    expect($subscriptionCreateResponse->updatedAt)->toBe($expected['updatedAt']);
  });
}

assertSubscriptionCreateResponse(
  SubscriptionCreateResponse::fromArray($expected),
  $expected,
);
