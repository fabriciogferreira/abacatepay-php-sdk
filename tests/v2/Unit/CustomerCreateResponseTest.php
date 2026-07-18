<?php

use AbacatePay\v2\Responses\Customer\CustomerCreateResponse;

$expected = [
  'id' => '123',
  'email' => 'test@example.com',
  'name' => 'John Doe',
  'cellphone' => '11999999999',
  'taxId' => '12345678909',
  'zipCode' => '12345678909',
  'metadata' => [
    'key' => 'value',
  ],
];

/**
 * @param array<string, mixed> $expected
 */
function assertResponse(
  CustomerCreateResponse $customerCreateResponse,
  array $expected,
): void {
  it('should return the correct response', function () use ($customerCreateResponse, $expected) {
    expect($customerCreateResponse)->toBeInstanceOf(CustomerCreateResponse::class);
    expect($customerCreateResponse->id)->toBe($expected['id']);
    expect($customerCreateResponse->email)->toBe($expected['email']);
    expect($customerCreateResponse->name)->toBe($expected['name']);
    expect($customerCreateResponse->cellphone)->toBe($expected['cellphone']);
    expect($customerCreateResponse->taxId)->toBe($expected['taxId']);
    expect($customerCreateResponse->zipCode)->toBe($expected['zipCode']);
    expect($customerCreateResponse->metadata)->toBe($expected['metadata']);
  });
}


assertResponse(
  CustomerCreateResponse::fromArray($expected),
  $expected,
);