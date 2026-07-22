<?php

use AbacatePay\v2\Models\Item;
use AbacatePay\v2\Models\Fine;
use AbacatePay\v2\Models\Interest;
use AbacatePay\v2\ResponseData\Subscription\SubscriptionCreateResponseData;

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
function assertSubscriptionCreateResponseData(
  SubscriptionCreateResponseData $subscriptionCreateResponseData,
  array $expected,
): void {
  it('should return the correct response', function () use ($subscriptionCreateResponseData, $expected) {
    expect($subscriptionCreateResponseData)->toBeInstanceOf(SubscriptionCreateResponseData::class);
    expect($subscriptionCreateResponseData->id)->toBe($expected['id']);
    expect($subscriptionCreateResponseData->externalId)->toBe($expected['externalId']);
    expect($subscriptionCreateResponseData->url)->toBe($expected['url']);
    expect($subscriptionCreateResponseData->amount)->toBe($expected['amount']);
    expect($subscriptionCreateResponseData->paidAmount)->toBe($expected['paidAmount']);
    expect($subscriptionCreateResponseData->items)->toHaveCount(count($expected['items']));
    expect($subscriptionCreateResponseData->items[0])->toBeInstanceOf(Item::class);
    expect($subscriptionCreateResponseData->items[0]->toArray())->toBe($expected['items'][0]);
    expect($subscriptionCreateResponseData->status)->toBe($expected['status']);
    expect($subscriptionCreateResponseData->coupons)->toBe($expected['coupons']);
    expect($subscriptionCreateResponseData->devMode)->toBe($expected['devMode']);
    expect($subscriptionCreateResponseData->customerId)->toBe($expected['customerId']);
    expect($subscriptionCreateResponseData->returnUrl)->toBe($expected['returnUrl']);
    expect($subscriptionCreateResponseData->completionUrl)->toBe($expected['completionUrl']);
    expect($subscriptionCreateResponseData->receiptUrl)->toBe($expected['receiptUrl']);
    expect($subscriptionCreateResponseData->upSellProductId)->toBe($expected['upSellProductId']);
    expect($subscriptionCreateResponseData->installmentsCount)->toBe($expected['installmentsCount']);
    expect($subscriptionCreateResponseData->interest)->toBeInstanceOf(Interest::class);
    expect($subscriptionCreateResponseData->interest->value)->toBe($expected['interest']['value']);
    expect($subscriptionCreateResponseData->fine)->toBeInstanceOf(Fine::class);
    expect($subscriptionCreateResponseData->fine->value)->toBe($expected['fine']['value']);
    expect($subscriptionCreateResponseData->fine->type)->toBe($expected['fine']['type']);
    expect($subscriptionCreateResponseData->metadata)->toBe($expected['metadata']);
    expect($subscriptionCreateResponseData->createdAt)->toBe($expected['createdAt']);
    expect($subscriptionCreateResponseData->updatedAt)->toBe($expected['updatedAt']);
  });
}

assertSubscriptionCreateResponseData(
  SubscriptionCreateResponseData::fromArray($expected),
  $expected,
);
