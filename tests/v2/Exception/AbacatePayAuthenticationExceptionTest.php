<?php

use AbacatePay\v2\Exceptions\AbacatePayAuthenticationException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayAuthenticationException(),
    401,
  );

  assertExceptionMessage(
    new AbacatePayAuthenticationException(),
    'Authentication failed. Please check your credentials and try again.',
  );

  assertExceptionPrevious(
    new AbacatePayAuthenticationException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayAuthenticationException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayAuthenticationException('test', new Exception('test')),
    new Exception('test'),
  );
});
