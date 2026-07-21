<?php

use AbacatePay\v2\RequestData\Customer\CustomerCreateRequestData;

assertRequestData(
  CustomerCreateRequestData::make('test@example.com'),
  [
    'email' => 'test@example.com',
  ],
);

assertRequestData(
  CustomerCreateRequestData::make('test@example.com')
    ->name('John Doe'),
  [
    'email' => 'test@example.com',
    'name' => 'John Doe',
  ],
  'with name'
);

assertRequestData(
  CustomerCreateRequestData::make('test@example.com')
    ->cellphone('1234567890'),
  [
    'email' => 'test@example.com',
    'cellphone' => '1234567890',
  ],
  'with cellphone'
);

assertRequestData(
  CustomerCreateRequestData::make('test@example.com')
    ->taxId('1234567890'),
  [
    'email' => 'test@example.com',
    'taxId' => '1234567890',
  ],
  'with taxId'
);

assertRequestData(
  CustomerCreateRequestData::make('test@example.com')
    ->zipCode('1234567890'),
  [
    'email' => 'test@example.com',
    'zipCode' => '1234567890',
  ],
  'with zipCode'
);
