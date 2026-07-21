<?php

use AbacatePay\v2\Exceptions\AbacatePayValidationException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayValidationException(),
    422,
  );

  assertExceptionMessage(
    new AbacatePayValidationException(),
    'Validation failed. Please check your request and try again.',
  );

  assertExceptionPrevious(
    new AbacatePayValidationException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayValidationException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayValidationException('test', new Exception('test')),
    new Exception('test'),
  );
});
