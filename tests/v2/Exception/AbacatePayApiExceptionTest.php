<?php

use AbacatePay\v2\Exceptions\AbacatePayApiException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayApiException(),
    500,
  );

  assertExceptionMessage(
    new AbacatePayApiException(),
    'An API error occurred while communicating with the AbacatePay API.',
  );

  assertExceptionPrevious(
    new AbacatePayApiException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayApiException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayApiException('test', new Exception('test')),
    new Exception('test'),
  );
});
