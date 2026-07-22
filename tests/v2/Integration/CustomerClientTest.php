<?php

use Faker\Factory;
use AbacatePay\v2\Clients\AbacatePayClient;
use AbacatePay\v2\RequestData\Customer\CustomerGetRequestData;
use AbacatePay\v2\RequestData\Customer\CustomerCreateRequestData;
use AbacatePay\v2\RequestData\Customer\CustomerDeleteRequestData;

beforeEach(function () {
  $token = getToken();

  if (!$token) {
    $this->markTestSkipped('ABACATEPAY_API_KEY is not set');
  }
});

// test('creates a customer', function () {
//   $faker = Factory::create('pt_BR');

//   $email = $faker->email();
//   $cellphone = $faker->phoneNumber();
//   $name = $faker->name();
//   $taxId = rand(0, 1) ? $faker->cnpj() : $faker->cpf();
//   $zipCode = $faker->postcode();
//   // $metadata = [
//     // 'string' => 'string',
//     // 'int' => 123,
//     // 'float' => 123.45,
//     // 'bool' => true,
//     // 'array' => [1, 2, 3],
//     // 'object' => (object) ['key' => 'value'],
//   // ];

//   $token = getToken();

//   $abacatePayClient = new AbacatePayClient($token);

//   $customerCreateRequestData = CustomerCreateRequestData::make($email)
//     ->cellphone($cellphone)
//     ->name($name)
//     ->taxId($taxId)
//     ->zipCode($zipCode)
//     // ->metadata($metadata)
//     ;

//   $customerCreateResponseBody = $abacatePayClient->customers()
//     ->create($customerCreateRequestData);

//   expect($customerCreateResponseBody)
//     ->not->toBeNull()
//     ->and($customerCreateResponseBody->data->id)->not->toBeEmpty()
//     ->and($customerCreateResponseBody->data->email)->toBe($email)
//     ->and($customerCreateResponseBody->data->cellphone)->toBe($cellphone)
//     ->and($customerCreateResponseBody->data->taxId)->toBe($taxId)
//     ->and($customerCreateResponseBody->data->zipCode)->toBe($zipCode)
//     // ->and($customerCreateResponseBody->metadata)->toBe($metadata)
//     ;
// });

// test('gets a customer', function () {
//   $faker = Factory::create('pt_BR');

//   $email = $faker->email();
//   $cellphone = $faker->phoneNumber();
//   $name = $faker->name();
//   $taxId = rand(0, 1) ? $faker->cnpj() : $faker->cpf();
//   $zipCode = $faker->postcode();

//   $token = getToken();

//   $abacatePayClient = new AbacatePayClient($token);

//   $customerCreateRequestData = CustomerCreateRequestData::make($email)
//     ->cellphone($cellphone)
//     ->name($name)
//     ->taxId($taxId)
//     ->zipCode($zipCode)
//     ;

//   $customerCreateResponseBody = $abacatePayClient->customers()
//     ->create($customerCreateRequestData);

//   $customerGetRequestData = CustomerGetRequestData::make($customerCreateResponseBody->data->id);

//   $customerGetResponseBody = $abacatePayClient->customers()
//     ->get($customerGetRequestData);

//   expect($customerGetResponseBody)
//     ->not->toBeNull()
//     ->and($customerGetResponseBody->data->id)->toBe($customerCreateResponseBody->data->id)
//     ->and($customerGetResponseBody->data->devMode)->toBe(true)
//     ->and($customerGetResponseBody->data->name)->toBe($customerCreateResponseBody->data->name)
//     ->and($customerGetResponseBody->data->email)->toBe($customerCreateResponseBody->data->email)
//     ->and($customerGetResponseBody->data->cellphone)->toBe($customerCreateResponseBody->data->cellphone)
//     ->and($customerGetResponseBody->data->taxId)->toBe($customerCreateResponseBody->data->taxId)
//     ->and($customerGetResponseBody->data->zipCode)->toBe($customerCreateResponseBody->data->zipCode)
//     ;
// });

// test('deletes a customer', function () {
//   $faker = Factory::create('pt_BR');

//   $email = $faker->email();
//   $cellphone = $faker->phoneNumber();
//   $name = $faker->name();
//   $taxId = rand(0, 1) ? $faker->cnpj() : $faker->cpf();
//   $zipCode = $faker->postcode();
//   // $metadata = [
//     // 'string' => 'string',
//     // 'int' => 123,
//     // 'float' => 123.45,
//     // 'bool' => true,
//     // 'array' => [1, 2, 3],
//     // 'object' => (object) ['key' => 'value'],
//   // ];

//   $token = getToken();

//   $abacatePayClient = new AbacatePayClient($token);

//   $customerCreateRequestData = CustomerCreateRequestData::make($email)
//     ->cellphone($cellphone)
//     ->name($name)
//     ->taxId($taxId)
//     ->zipCode($zipCode)
//     // ->metadata($metadata)
//     ;

//   $customerCreateResponseBody = $abacatePayClient->customers()
//     ->create($customerCreateRequestData);

//   $customerDeleteRequestData = CustomerDeleteRequestData::make($customerCreateResponseBody->data->id);

//   $customerDeleteResponseBody = $abacatePayClient->customers()
//     ->delete($customerDeleteRequestData);

//   expect($customerDeleteResponseBody)
//     ->not->toBeNull()
//     ->and($customerDeleteResponseBody->data->id)->toBe($customerCreateResponseBody->data->id)
//     ->and($customerDeleteResponseBody->data->devMode)->toBe(true)
//     ->and($customerDeleteResponseBody->data->name)->toBe($customerCreateResponseBody->data->name)
//     ->and($customerDeleteResponseBody->data->email)->toBe($customerCreateResponseBody->data->email)
//     ->and($customerDeleteResponseBody->data->cellphone)->toBe($customerCreateResponseBody->data->cellphone)
//     ->and($customerDeleteResponseBody->data->taxId)->toBe($customerCreateResponseBody->data->taxId)
//     ->and($customerDeleteResponseBody->data->zipCode)->toBe($customerCreateResponseBody->data->zipCode)
//     // ->and($customerDeleteResponse->metadata)->toBe($customerCreateResponse->metadata)
//     ;
// });