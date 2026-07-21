<?php

use AbacatePay\v2\ResponseData\Customer\CustomerCreateResponseData;

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
function assertCustomerCreateResponseData(
  CustomerCreateResponseData $customerCreateResponseData,
  array $expected,
): void {
  it('should return the correct response', function () use ($customerCreateResponseData, $expected) {
    expect($customerCreateResponseData)->toBeInstanceOf(CustomerCreateResponseData::class);
    expect($customerCreateResponseData->id)->toBe($expected['id']);
    expect($customerCreateResponseData->email)->toBe($expected['email']);
    expect($customerCreateResponseData->name)->toBe($expected['name']);
    expect($customerCreateResponseData->cellphone)->toBe($expected['cellphone']);
    expect($customerCreateResponseData->taxId)->toBe($expected['taxId']);
    expect($customerCreateResponseData->zipCode)->toBe($expected['zipCode']);
    expect($customerCreateResponseData->metadata)->toBe($expected['metadata']);
  });
}

assertCustomerCreateResponseData(
  CustomerCreateResponseData::fromArray($expected),
  $expected,
);