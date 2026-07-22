<?php

use AbacatePay\v2\ResponseBody\Subscription\SubscriptionCreateResponseBody;
use AbacatePay\v2\Models\Fine;
use AbacatePay\v2\Models\Interest;
use AbacatePay\v2\Models\Item;

it('creates subscription create response body from array', function () {
  $response = new SubscriptionCreateResponseBody([
    'success' => true,
    'error' => null,
    'data' => [
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
    ],
  ]);

  expect($response->success)->toBeTrue();
  expect($response->error)->toBeNull();

  expect($response->data->id)->toBe('bill_abc123xyz');
  expect($response->data->externalId)->toBe('subs-123');
  expect($response->data->url)->toBe('https://app.abacatepay.com/pay/bill_abc123xyz');
  expect($response->data->amount)->toBe(10000);
  expect($response->data->paidAmount)->toBeNull();
  expect($response->data->items)->toHaveCount(1);
  expect($response->data->items[0])->toBeInstanceOf(Item::class);
  expect($response->data->items[0]->toArray())->toBe([
    'id' => 'prod_abc123xyz',
    'quantity' => 1,
  ]);
  expect($response->data->status)->toBe('PENDING');
  expect($response->data->coupons)->toBe(['ABKT10']);
  expect($response->data->devMode)->toBeTrue();
  expect($response->data->customerId)->toBe('cust_abc123xyz');
  expect($response->data->returnUrl)->toBe('https://seusite.com/voltar');
  expect($response->data->completionUrl)->toBe('https://seusite.com/sucesso');
  expect($response->data->receiptUrl)->toBeNull();
  expect($response->data->upSellProductId)->toBeNull();
  expect($response->data->installmentsCount)->toBeNull();
  expect($response->data->interest)->toBeInstanceOf(Interest::class);
  expect($response->data->interest->value)->toBe(100);
  expect($response->data->fine)->toBeInstanceOf(Fine::class);
  expect($response->data->fine->value)->toBe(200);
  expect($response->data->fine->type)->toBe('PERCENTAGE');
  expect($response->data->metadata)->toBe([
    'origem' => 'app-mobile',
  ]);
  expect($response->data->createdAt)->toBe('2024-11-04T18:38:28.573Z');
  expect($response->data->updatedAt)->toBe('2024-11-04T18:38:28.573Z');
});
