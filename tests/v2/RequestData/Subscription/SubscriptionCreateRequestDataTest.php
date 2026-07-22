<?php

use AbacatePay\v2\Enums\SubscriptionMethodEnum;
use AbacatePay\v2\Models\Item;
use AbacatePay\v2\RequestData\Subscription\SubscriptionCreateRequestData;

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ]),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
  ],
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->methods([SubscriptionMethodEnum::CARD]),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'methods' => ['CARD'],
  ],
  'with methods'
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->returnUrl('https://seusite.com/voltar'),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'returnUrl' => 'https://seusite.com/voltar',
  ],
  'with returnUrl'
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->completionUrl('https://seusite.com/sucesso'),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'completionUrl' => 'https://seusite.com/sucesso',
  ],
  'with completionUrl'
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->customerId('cust_abc123xyz'),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'customerId' => 'cust_abc123xyz',
  ],
  'with customerId'
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->coupons(['ABKT10', 'PROMO10']),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'coupons' => ['ABKT10', 'PROMO10'],
  ],
  'with coupons'
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->externalId('subs-123'),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'externalId' => 'subs-123',
  ],
  'with externalId'
);

assertRequestData(
  SubscriptionCreateRequestData::make([
    Item::make('prod_abc123xyz', 1),
  ])
    ->metadata(['origem' => 'app-mobile']),
  [
    'items' => [
      [
        'id' => 'prod_abc123xyz',
        'quantity' => 1,
      ],
    ],
    'metadata' => ['origem' => 'app-mobile'],
  ],
  'with metadata'
);
