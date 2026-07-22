<?php

use AbacatePay\v2\ResponseBody\Customer\CustomerCreateResponseBody;

it('creates customer create response body from array', function () {
  $response = new CustomerCreateResponseBody([
    'success' => true,
    'error' => null,
    'data' => [
      'id' => 'cus_123',
      'email' => 'john@example.com',
      'name' => 'John Doe',
      'cellphone' => '5511999999999',
      'taxId' => '12345678900',
      'zipCode' => '01001000',
      'metadata' => [
        'source' => 'sdk',
      ],
    ],
  ]);

  expect($response->success)->toBeTrue();
  expect($response->error)->toBeNull();

  expect($response->data->id)->toBe('cus_123');
  expect($response->data->email)->toBe('john@example.com');
  expect($response->data->name)->toBe('John Doe');
  expect($response->data->cellphone)->toBe('5511999999999');
  expect($response->data->taxId)->toBe('12345678900');
  expect($response->data->zipCode)->toBe('01001000');
  expect($response->data->metadata)->toBe([
    'source' => 'sdk',
  ]);
});
