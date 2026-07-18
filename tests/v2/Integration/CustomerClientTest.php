<?php

use Faker\Factory;
use AbacatePay\v2\Clients\AbacatePayClient;
use AbacatePay\v2\Body\Customer\CustomerCreateBody;

function getToken(): ?string
{
  return $_ENV['ABACATEPAY_API_KEY'];
}

beforeEach(function () {
  $token = getToken();

  if (!$token) {
    $this->markTestSkipped('ABACATEPAY_API_KEY is not set');
  }
});

test('creates a customer', function () {
  $faker = Factory::create('pt_BR');

  $email = $faker->email();
  $cellphone = $faker->phoneNumber();
  $name = $faker->name();
  $taxId = rand(0, 1) ? $faker->cnpj() : $faker->cpf();
  $zipCode = $faker->postcode();
  // $metadata = [
    // 'string' => 'string',
    // 'int' => 123,
    // 'float' => 123.45,
    // 'bool' => true,
    // 'array' => [1, 2, 3],
    // 'object' => (object) ['key' => 'value'],
  // ];

  $token = getToken();

  $abacatePayClient = new AbacatePayClient($token);

  $customerCreateBody = CustomerCreateBody::make($email)
    ->cellphone($cellphone)
    ->name($name)
    ->taxId($taxId)
    ->zipCode($zipCode)
    // ->metadata($metadata)
    ;

  $customerCreateResponse = $abacatePayClient->customers()
    ->create($customerCreateBody);

  expect($customerCreateResponse)
    ->not->toBeNull()
    ->and($customerCreateResponse->id)->not->toBeEmpty()
    ->and($customerCreateResponse->email)->toBe($email)
    ->and($customerCreateResponse->cellphone)->toBe($cellphone)
    ->and($customerCreateResponse->taxId)->toBe($taxId)
    ->and($customerCreateResponse->zipCode)->toBe($zipCode)
    // ->and($customerCreateResponse->metadata)->toBe($metadata)
    ;
});
