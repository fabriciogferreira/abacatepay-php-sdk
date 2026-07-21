<?php

use AbacatePay\v2\ResponseData\Customer\CustomerDeleteResponseData;

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
function assertCustomerDeleteResponseData(
  CustomerDeleteResponseData $customerDeleteResponseData,
  array $expected,
): void {
  it('should return the correct response', function () use ($customerDeleteResponseData, $expected) {
    expect($customerDeleteResponseData)->toBeInstanceOf(CustomerDeleteResponseData::class);
    expect($customerDeleteResponseData->id)->toBe($expected['id']);
    expect($customerDeleteResponseData->devMode)->toBe($expected['devMode']);
    expect($customerDeleteResponseData->name)->toBe($expected['name']);
    expect($customerDeleteResponseData->email)->toBe($expected['email']);
    expect($customerDeleteResponseData->cellphone)->toBe($expected['cellphone']);
    expect($customerDeleteResponseData->taxId)->toBe($expected['taxId']);
    expect($customerDeleteResponseData->zipCode)->toBe($expected['zipCode']);
    expect($customerDeleteResponseData->metadata)->toBe($expected['metadata']);
  });
}

assertCustomerDeleteResponseData(
  CustomerDeleteResponseData::fromArray($expected),
  $expected,
);
