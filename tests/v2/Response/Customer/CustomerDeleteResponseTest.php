<?php

use AbacatePay\v2\Responses\Customer\CustomerDeleteResponse;

$expected = [
  'id' => '123',
  'devMode' => true,
  'name' => 'John Doe',
  'email' => 'test@example.com',
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
function assertCustomerDeleteResponse(
  CustomerDeleteResponse $customerDeleteResponse,
  array $expected,
): void {
  it('should return the correct response', function () use ($customerDeleteResponse, $expected) {
    expect($customerDeleteResponse)->toBeInstanceOf(CustomerDeleteResponse::class);
    expect($customerDeleteResponse->id)->toBe($expected['id']);
    expect($customerDeleteResponse->devMode)->toBe($expected['devMode']);
    expect($customerDeleteResponse->name)->toBe($expected['name']);
    expect($customerDeleteResponse->email)->toBe($expected['email']);
    expect($customerDeleteResponse->cellphone)->toBe($expected['cellphone']);
    expect($customerDeleteResponse->taxId)->toBe($expected['taxId']);
    expect($customerDeleteResponse->zipCode)->toBe($expected['zipCode']);
    expect($customerDeleteResponse->metadata)->toBe($expected['metadata']);
  });
}

assertCustomerDeleteResponse(
  CustomerDeleteResponse::fromArray($expected),
  $expected,
);
