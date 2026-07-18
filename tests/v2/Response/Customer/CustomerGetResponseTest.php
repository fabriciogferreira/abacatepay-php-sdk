<?php

use AbacatePay\v2\Responses\Customer\CustomerGetResponse;

$expected = [
  'id' => '123',
  'devMode' => true,
  'name' => 'John Doe',
  'email' => 'test@example.com',
  'cellphone' => '11999999999',
  'taxId' => '12345678909',
  'country' => 'BR',
  'zipCode' => '12345678909',
  'metadata' => [
    'key' => 'value',
  ],
];

/**
 * @param array<string, mixed> $expected
 */
function assertCustomerGetResponse(
  CustomerGetResponse $customerGetResponse,
  array $expected,
): void {
  it('should return the correct response', function () use ($customerGetResponse, $expected) {
    expect($customerGetResponse)->toBeInstanceOf(CustomerGetResponse::class);
    expect($customerGetResponse->id)->toBe($expected['id']);
    expect($customerGetResponse->devMode)->toBe($expected['devMode']);
    expect($customerGetResponse->name)->toBe($expected['name']);
    expect($customerGetResponse->email)->toBe($expected['email']);
    expect($customerGetResponse->cellphone)->toBe($expected['cellphone']);
    expect($customerGetResponse->taxId)->toBe($expected['taxId']);
    expect($customerGetResponse->country)->toBe($expected['country']);
    expect($customerGetResponse->zipCode)->toBe($expected['zipCode']);
    expect($customerGetResponse->metadata)->toBe($expected['metadata']);
  });
}

assertCustomerGetResponse(
  CustomerGetResponse::fromArray($expected),
  $expected,
);
