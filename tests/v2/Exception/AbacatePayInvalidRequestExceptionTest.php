<?php

use AbacatePay\v2\Exceptions\AbacatePayInvalidRequestException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayInvalidRequestException(),
    400,
  );

  assertExceptionMessage(
    new AbacatePayInvalidRequestException(),
    'Invalid request. Please check your request and try again.',
  );

  assertExceptionPrevious(
    new AbacatePayInvalidRequestException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayInvalidRequestException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayInvalidRequestException('test', new Exception('test')),
    new Exception('test'),
  );
});
