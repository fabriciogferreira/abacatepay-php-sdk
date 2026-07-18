<?php

use AbacatePay\v2\Body\Customer\CustomerCreateBody;

/**
 * @param array<string, mixed> $expected
 */
function assertBody(
  CustomerCreateBody $customerCreateBody,
  array $expected,
  string $description = '',
): void {
  it('should return the correct body '.$description, function () use ($customerCreateBody, $expected) {
    expect($customerCreateBody->toArray())->toBe($expected);
  });
}

assertBody(
  CustomerCreateBody::make('test@example.com'),
  [
    'email' => 'test@example.com',
  ],
);

assertBody(
  CustomerCreateBody::make('test@example.com')
    ->name('John Doe'),
  [
    'email' => 'test@example.com',
    'name' => 'John Doe',
  ],
  'with name'
);

assertBody(
  CustomerCreateBody::make('test@example.com')
    ->cellphone('1234567890'),
  [
    'email' => 'test@example.com',
    'cellphone' => '1234567890',
  ],
  'with cellphone'
);

assertBody(
  CustomerCreateBody::make('test@example.com')
    ->taxId('1234567890'),
  [
    'email' => 'test@example.com',
    'taxId' => '1234567890',
  ],
  'with taxId'
);

assertBody(
  CustomerCreateBody::make('test@example.com')
    ->zipCode('1234567890'),
  [
    'email' => 'test@example.com',
    'zipCode' => '1234567890',
  ],
  'with zipCode'
);
