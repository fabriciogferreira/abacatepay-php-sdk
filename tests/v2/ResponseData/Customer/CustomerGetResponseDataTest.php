<?php

use AbacatePay\v2\ResponseData\Customer\CustomerGetResponseData;

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
function assertCustomerGetResponseData(
  CustomerGetResponseData $customerGetResponseData,
  array $expected,
): void {
  it('should return the correct response', function () use ($customerGetResponseData, $expected) {
    expect($customerGetResponseData)->toBeInstanceOf(CustomerGetResponseData::class);
    expect($customerGetResponseData->id)->toBe($expected['id']);
    expect($customerGetResponseData->devMode)->toBe($expected['devMode']);
    expect($customerGetResponseData->name)->toBe($expected['name']);
    expect($customerGetResponseData->email)->toBe($expected['email']);
    expect($customerGetResponseData->cellphone)->toBe($expected['cellphone']);
    expect($customerGetResponseData->taxId)->toBe($expected['taxId']);
    expect($customerGetResponseData->country)->toBe($expected['country']);
    expect($customerGetResponseData->zipCode)->toBe($expected['zipCode']);
    expect($customerGetResponseData->metadata)->toBe($expected['metadata']);
  });
}

assertCustomerGetResponseData(
  CustomerGetResponseData::fromArray($expected),
  $expected,
);
