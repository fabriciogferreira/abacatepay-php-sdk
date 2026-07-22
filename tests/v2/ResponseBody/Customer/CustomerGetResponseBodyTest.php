<?php

use AbacatePay\v2\ResponseBody\Customer\CustomerGetResponseBody;

it('creates customer get response body from array', function () {
  $response = new CustomerGetResponseBody([
    'success' => true,
    'error' => null,
    'data' => [
      'id' => 'cus_123',
      'devMode' => true,
      'name' => 'John Doe',
      'email' => 'john@example.com',
      'cellphone' => '5511999999999',
      'taxId' => '12345678900',
      'country' => 'BR',
      'zipCode' => '01001000',
      'metadata' => [
        'source' => 'sdk',
      ],
    ],
  ]);

  expect($response->success)->toBeTrue();
  expect($response->error)->toBeNull();

  expect($response->data->id)->toBe('cus_123');
  expect($response->data->devMode)->toBeTrue();
  expect($response->data->name)->toBe('John Doe');
  expect($response->data->email)->toBe('john@example.com');
  expect($response->data->cellphone)->toBe('5511999999999');
  expect($response->data->taxId)->toBe('12345678900');
  expect($response->data->country)->toBe('BR');
  expect($response->data->zipCode)->toBe('01001000');
  expect($response->data->metadata)->toBe([
    'source' => 'sdk',
  ]);
});
