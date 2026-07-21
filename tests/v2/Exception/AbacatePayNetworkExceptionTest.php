<?php

use AbacatePay\v2\Exceptions\AbacatePayNetworkException;

describe('without parameters', function () {
  assertExceptionCode(
    new AbacatePayNetworkException(),
    0,
  );

  assertExceptionMessage(
    new AbacatePayNetworkException(),
    'A network error occurred while communicating with the AbacatePay API.',
  );

  assertExceptionPrevious(
    new AbacatePayNetworkException(),
    null,
  );
});

describe('with parameters', function () {
  assertExceptionMessage(
    new AbacatePayNetworkException('test'),
    'test',
  );

  assertExceptionPrevious(
    new AbacatePayNetworkException('test', new Exception('test')),
    new Exception('test'),
  );
});
