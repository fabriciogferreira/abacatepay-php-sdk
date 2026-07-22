<?php

use Faker\Factory;
use AbacatePay\v2\Models\Item;
use AbacatePay\v2\Clients\AbacatePayClient;
use AbacatePay\v2\Enums\SubscriptionMethodEnum;
use AbacatePay\v2\RequestData\Customer\CustomerCreateRequestData;
use AbacatePay\v2\RequestData\Subscription\SubscriptionCancelRequestData;
use AbacatePay\v2\RequestData\Subscription\SubscriptionCreateRequestData;

beforeEach(function () {
  $token = getToken();

  if (!$token) {
    $this->markTestSkipped('ABACATEPAY_API_KEY is not set');
  }
});

test('creates a subscription', function () {
  $faker = Factory::create('pt_BR');
  $token = getToken();
  $abacatePayClient = new AbacatePayClient($token);

  $product = $abacatePayClient->post('products/create', [
    'json' => [
      'externalId' => 'sdk-test-sub-'.uniqid(),
      'name' => 'Plano Teste SDK',
      'price' => 4990,
      'currency' => 'BRL',
      'cycle' => 'MONTHLY',
      'description' => 'Produto de assinatura para testes do SDK',
    ],
  ]);

  $customerCreateResponseBody = $abacatePayClient->customers()->create(
    CustomerCreateRequestData::make($faker->email())
      ->cellphone($faker->phoneNumber())
      ->name($faker->name())
      ->taxId(rand(0, 1) ? $faker->cnpj() : $faker->cpf())
      ->zipCode($faker->postcode())
  );

  $externalId = 'subs-'.uniqid();
  $returnUrl = 'https://seusite.com/voltar';
  $completionUrl = 'https://seusite.com/sucesso';

  $subscriptionCreateRequestData = SubscriptionCreateRequestData::make([
    Item::make($product['id'], 1),
  ])
    ->methods([SubscriptionMethodEnum::CARD])
    ->customerId($customerCreateResponseBody->data->id)
    ->externalId($externalId)
    ->returnUrl($returnUrl)
    ->completionUrl($completionUrl);

  $subscriptionCreateResponseBody = $abacatePayClient->subscriptions()
    ->create($subscriptionCreateRequestData);

  expect($subscriptionCreateResponseBody)
    ->not->toBeNull()
    ->and($subscriptionCreateResponseBody->data->id)->not->toBeEmpty()
    ->and($subscriptionCreateResponseBody->data->url)->not->toBeEmpty()
    ->and($subscriptionCreateResponseBody->data->externalId)->toBe($externalId)
    ->and($subscriptionCreateResponseBody->data->amount)->toBe(4990)
    ->and($subscriptionCreateResponseBody->data->paidAmount)->toBeNull()
    ->and($subscriptionCreateResponseBody->data->items)->toHaveCount(1)
    ->and($subscriptionCreateResponseBody->data->items[0]->toArray())->toBe([
      'id' => $product['id'],
      'quantity' => 1,
    ])
    ->and($subscriptionCreateResponseBody->data->status)->toBe('PENDING')
    ->and($subscriptionCreateResponseBody->data->devMode)->toBe(true)
    ->and($subscriptionCreateResponseBody->data->customerId)->toBe($customerCreateResponseBody->data->id)
    ->and($subscriptionCreateResponseBody->data->returnUrl)->toBe($returnUrl)
    ->and($subscriptionCreateResponseBody->data->completionUrl)->toBe($completionUrl)
    ->and($subscriptionCreateResponseBody->data->createdAt)->not->toBeEmpty()
    ->and($subscriptionCreateResponseBody->data->updatedAt)->not->toBeEmpty()
  ;
});

test('cancels a subscription', function () {
  $faker = Factory::create('pt_BR');
  $token = getToken();
  $abacatePayClient = new AbacatePayClient($token);

  $product = $abacatePayClient->post('products/create', [
    'json' => [
      'externalId' => 'sdk-test-sub-cancel-'.uniqid(),
      'name' => 'Plano Teste SDK Cancel',
      'price' => 4990,
      'currency' => 'BRL',
      'cycle' => 'MONTHLY',
      'description' => 'Produto de assinatura para testes de cancelamento do SDK',
    ],
  ]);

  $customerCreateResponseBody = $abacatePayClient->customers()->create(
    CustomerCreateRequestData::make($faker->email())
      ->cellphone($faker->phoneNumber())
      ->name($faker->name())
      ->taxId(rand(0, 1) ? $faker->cnpj() : $faker->cpf())
      ->zipCode($faker->postcode())
  );

  $externalId = 'subs-cancel-'.uniqid();
  $returnUrl = 'https://seusite.com/voltar';
  $completionUrl = 'https://seusite.com/sucesso';

  $subscriptionCreateRequestData = SubscriptionCreateRequestData::make([
    Item::make($product['id'], 1),
  ])
    ->methods([SubscriptionMethodEnum::CARD])
    ->customerId($customerCreateResponseBody->data->id)
    ->externalId($externalId)
    ->returnUrl($returnUrl)
    ->completionUrl($completionUrl);

  $subscriptionCreateResponseBody = $abacatePayClient->subscriptions()
    ->create($subscriptionCreateRequestData);

  $subscriptionCancelResponseBody = $abacatePayClient->subscriptions()
    ->cancel(SubscriptionCancelRequestData::make($subscriptionCreateResponseBody->data->id));

  expect($subscriptionCancelResponseBody)
    ->not->toBeNull()
    ->and($subscriptionCancelResponseBody->data->id)->not->toBeEmpty()
    ->and($subscriptionCancelResponseBody->data->customerId)->toBe($customerCreateResponseBody->data->id)
    ->and($subscriptionCancelResponseBody->data->amount)->toBe(4990)
    ->and($subscriptionCancelResponseBody->data->status)->toBe('CANCELLED')
    ->and($subscriptionCancelResponseBody->data->method)->toBe('CARD')
    ->and($subscriptionCancelResponseBody->data->coupons)->toBe([])
    ->and($subscriptionCancelResponseBody->data->devMode)->toBe(true)
    ->and($subscriptionCancelResponseBody->data->trialDays)->toBeNull()
    ->and($subscriptionCancelResponseBody->data->trialEndsAt)->toBeNull()
    ->and($subscriptionCancelResponseBody->data->createdAt)->not->toBeEmpty()
    ->and($subscriptionCancelResponseBody->data->updatedAt)->not->toBeEmpty()
  ;
});
