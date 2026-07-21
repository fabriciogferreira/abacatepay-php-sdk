<?php

use AbacatePay\v2\Exceptions\AbacatePayNotFoundException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayNotFoundException(),
    404,
  );

  assertExceptionMessage(
    new AbacatePayNotFoundException(),
    'Resource not found. Please check your request and try again.',
  );

  assertExceptionPrevious(
    new AbacatePayNotFoundException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayNotFoundException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayNotFoundException('test', new Exception('test')),
    new Exception('test'),
  );
});
