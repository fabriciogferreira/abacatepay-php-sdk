<?php

use Faker\Factory;
use AbacatePay\v2\Body\Item;
use AbacatePay\v2\Clients\AbacatePayClient;
use AbacatePay\v2\Body\Customer\CustomerCreateBody;
use AbacatePay\v2\Enums\SubscriptionMethodEnum;
use AbacatePay\v2\Body\Subscription\SubscriptionCancelBody;
use AbacatePay\v2\Body\Subscription\SubscriptionCreateBody;

beforeEach(function () {
  $token = getToken();

  if (!$token) {
    $this->markTestSkipped('ABACATEPAY_API_KEY is not set');
  }
});

// test('creates a subscription', function () {
//   $faker = Factory::create('pt_BR');
//   $token = getToken();
//   $abacatePayClient = new AbacatePayClient($token);

//   $product = $abacatePayClient->post('products/create', [
//     'json' => [
//       'externalId' => 'sdk-test-sub-'.uniqid(),
//       'name' => 'Plano Teste SDK',
//       'price' => 4990,
//       'currency' => 'BRL',
//       'cycle' => 'MONTHLY',
//       'description' => 'Produto de assinatura para testes do SDK',
//     ],
//   ]);

//   $customerCreateResponse = $abacatePayClient->customers()->create(
//     CustomerCreateBody::make($faker->email())
//       ->cellphone($faker->phoneNumber())
//       ->name($faker->name())
//       ->taxId(rand(0, 1) ? $faker->cnpj() : $faker->cpf())
//       ->zipCode($faker->postcode())
//   );

//   $externalId = 'subs-'.uniqid();
//   $returnUrl = 'https://seusite.com/voltar';
//   $completionUrl = 'https://seusite.com/sucesso';

//   $subscriptionCreateBody = SubscriptionCreateBody::make([
//     Item::make($product['id'], 1),
//   ])
//     ->methods([SubscriptionMethodEnum::CARD])
//     ->customerId($customerCreateResponse->id)
//     ->externalId($externalId)
//     ->returnUrl($returnUrl)
//     ->completionUrl($completionUrl);

//   $subscriptionCreateResponse = $abacatePayClient->subscriptions()
//     ->create($subscriptionCreateBody);

//   expect($subscriptionCreateResponse)
//     ->not->toBeNull()
//     ->and($subscriptionCreateResponse->id)->not->toBeEmpty()
//     ->and($subscriptionCreateResponse->url)->not->toBeEmpty()
//     ->and($subscriptionCreateResponse->externalId)->toBe($externalId)
//     ->and($subscriptionCreateResponse->amount)->toBe(4990)
//     ->and($subscriptionCreateResponse->paidAmount)->toBeNull()
//     ->and($subscriptionCreateResponse->items)->toHaveCount(1)
//     ->and($subscriptionCreateResponse->items[0]->toArray())->toBe([
//       'id' => $product['id'],
//       'quantity' => 1,
//     ])
//     ->and($subscriptionCreateResponse->status)->toBe('PENDING')
//     ->and($subscriptionCreateResponse->devMode)->toBe(true)
//     ->and($subscriptionCreateResponse->customerId)->toBe($customerCreateResponse->id)
//     ->and($subscriptionCreateResponse->returnUrl)->toBe($returnUrl)
//     ->and($subscriptionCreateResponse->completionUrl)->toBe($completionUrl)
//     ->and($subscriptionCreateResponse->createdAt)->not->toBeEmpty()
//     ->and($subscriptionCreateResponse->updatedAt)->not->toBeEmpty()
//   ;
// });

// test('cancels a subscription', function () {
//   $faker = Factory::create('pt_BR');
//   $token = getToken();
//   $abacatePayClient = new AbacatePayClient($token);

//   $product = $abacatePayClient->post('products/create', [
//     'json' => [
//       'externalId' => 'sdk-test-sub-cancel-'.uniqid(),
//       'name' => 'Plano Teste SDK Cancel',
//       'price' => 4990,
//       'currency' => 'BRL',
//       'cycle' => 'MONTHLY',
//       'description' => 'Produto de assinatura para testes de cancelamento do SDK',
//     ],
//   ]);

//   $customerCreateResponse = $abacatePayClient->customers()->create(
//     CustomerCreateBody::make($faker->email())
//       ->cellphone($faker->phoneNumber())
//       ->name($faker->name())
//       ->taxId(rand(0, 1) ? $faker->cnpj() : $faker->cpf())
//       ->zipCode($faker->postcode())
//   );

//   $externalId = 'subs-cancel-'.uniqid();
//   $returnUrl = 'https://seusite.com/voltar';
//   $completionUrl = 'https://seusite.com/sucesso';

//   $subscriptionCreateBody = SubscriptionCreateBody::make([
//     Item::make($product['id'], 1),
//   ])
//     ->methods([SubscriptionMethodEnum::CARD])
//     ->customerId($customerCreateResponse->id)
//     ->externalId($externalId)
//     ->returnUrl($returnUrl)
//     ->completionUrl($completionUrl);

//   $subscriptionCreateResponse = $abacatePayClient->subscriptions()
//     ->create($subscriptionCreateBody);

//   $subscriptionCancelResponse = $abacatePayClient->subscriptions()
//     ->cancel(SubscriptionCancelBody::make($subscriptionCreateResponse->id));

//   expect($subscriptionCancelResponse)
//     ->not->toBeNull()
//     ->and($subscriptionCancelResponse->id)->not->toBeEmpty()
//     ->and($subscriptionCancelResponse->customerId)->toBe($customerCreateResponse->id)
//     ->and($subscriptionCancelResponse->amount)->toBe(4990)
//     ->and($subscriptionCancelResponse->status)->toBe('CANCELLED')
//     ->and($subscriptionCancelResponse->method)->toBe('CARD')
//     ->and($subscriptionCancelResponse->coupons)->toBe([])
//     ->and($subscriptionCancelResponse->devMode)->toBe(true)
//     ->and($subscriptionCancelResponse->trialDays)->toBeNull()
//     ->and($subscriptionCancelResponse->trialEndsAt)->toBeNull()
//     ->and($subscriptionCancelResponse->createdAt)->not->toBeEmpty()
//     ->and($subscriptionCancelResponse->updatedAt)->not->toBeEmpty()
//   ;
// });
