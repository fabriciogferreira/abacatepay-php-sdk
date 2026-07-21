<?php

use AbacatePay\v2\RequestData\Subscription\SubscriptionCancelRequestData;

assertRequestData(
  SubscriptionCancelRequestData::make('subs_abc123xyz'),
  [
    'id' => 'subs_abc123xyz',
  ],
);
