<?php

use AbacatePay\v2\Body\Subscription\SubscriptionCancelBody;

assertBody(
  SubscriptionCancelBody::make('subs_abc123xyz'),
  [
    'id' => 'subs_abc123xyz',
  ],
);
