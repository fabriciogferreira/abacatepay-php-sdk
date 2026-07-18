<?php

use Faker\Factory;
use AbacatePay\v2\Clients\AbacatePayClient;
use AbacatePay\v2\Body\Customer\CustomerCreateBody;
use AbacatePay\v2\Body\Customer\CustomerDeleteBody;

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


test('deletes a customer', function () {
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

  $customerDeleteBody = CustomerDeleteBody::make($customerCreateResponse->id);

  $customerDeleteResponse = $abacatePayClient->customers()
    ->delete($customerDeleteBody);

  expect($customerDeleteResponse)
    ->not->toBeNull()
    ->and($customerDeleteResponse->id)->toBe($customerCreateResponse->id)
    ->and($customerDeleteResponse->devMode)->toBe(true)
    ->and($customerDeleteResponse->name)->toBe($customerCreateResponse->name)
    ->and($customerDeleteResponse->email)->toBe($customerCreateResponse->email)
    ->and($customerDeleteResponse->cellphone)->toBe($customerCreateResponse->cellphone)
    ->and($customerDeleteResponse->taxId)->toBe($customerCreateResponse->taxId)
    ->and($customerDeleteResponse->zipCode)->toBe($customerCreateResponse->zipCode)
    // ->and($customerDeleteResponse->metadata)->toBe($customerCreateResponse->metadata)
    ;
});