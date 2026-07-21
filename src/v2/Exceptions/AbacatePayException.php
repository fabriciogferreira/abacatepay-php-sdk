<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

use Exception;

abstract class AbacatePayException extends Exception
{
  public function __construct(
    string $message = 'General error',
    int $code = 0,
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      $code,
      $previous
    );
  }
}
