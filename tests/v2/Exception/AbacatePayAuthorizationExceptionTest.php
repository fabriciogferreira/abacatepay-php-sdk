<?php

use AbacatePay\v2\Exceptions\AbacatePayAuthorizationException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayAuthorizationException(),
    403,
  );

  assertExceptionMessage(
    new AbacatePayAuthorizationException(),
    'You are not authorized to access this resource.',
  );

  assertExceptionPrevious(
    new AbacatePayAuthorizationException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayAuthorizationException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayAuthorizationException('test', new Exception('test')),
    new Exception('test'),
  );
});
