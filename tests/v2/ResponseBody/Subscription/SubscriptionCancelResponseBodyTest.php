<?php

use AbacatePay\v2\ResponseBody\Subscription\SubscriptionCancelResponseBody;

it('creates subscription cancel response body from array', function () {
  $response = new SubscriptionCancelResponseBody([
    'success' => true,
    'error' => null,
    'data' => [
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
    ],
  ]);

  expect($response->success)->toBeTrue();
  expect($response->error)->toBeNull();

  expect($response->data->id)->toBe('subs_abc123xyz');
  expect($response->data->customerId)->toBe('cust_abc123xyz');
  expect($response->data->amount)->toBe(2990);
  expect($response->data->status)->toBe('CANCELLED');
  expect($response->data->method)->toBe('CARD');
  expect($response->data->coupons)->toBe([]);
  expect($response->data->devMode)->toBeFalse();
  expect($response->data->trialDays)->toBeNull();
  expect($response->data->trialEndsAt)->toBeNull();
  expect($response->data->createdAt)->toBe('2024-12-06T20:00:00.000Z');
  expect($response->data->updatedAt)->toBe('2024-12-06T20:00:05.000Z');
});
