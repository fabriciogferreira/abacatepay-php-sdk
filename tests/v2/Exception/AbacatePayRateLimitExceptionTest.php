<?php

use AbacatePay\v2\Exceptions\AbacatePayRateLimitException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayRateLimitException(),
    429,
  );

  assertExceptionMessage(
    new AbacatePayRateLimitException(),
    'Rate limit exceeded. Please try again later.',
  );

  assertExceptionPrevious(
    new AbacatePayRateLimitException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayRateLimitException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayRateLimitException('test', new Exception('test')),
    new Exception('test'),
  );
});
