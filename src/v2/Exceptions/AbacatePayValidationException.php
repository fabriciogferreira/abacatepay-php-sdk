<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayValidationException extends AbacatePayException
{
  public function __construct(
    string $message = 'Validation failed. Please check your request and try again.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      422,
      $previous,
    );
  }
}
