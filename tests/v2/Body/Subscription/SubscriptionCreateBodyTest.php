<?php

use AbacatePay\v2\Body\Item;
use AbacatePay\v2\Body\Subscription\SubscriptionCreateBody;
use AbacatePay\v2\Enums\SubscriptionMethodEnum;

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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

assertBody(
  SubscriptionCreateBody::make([
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
