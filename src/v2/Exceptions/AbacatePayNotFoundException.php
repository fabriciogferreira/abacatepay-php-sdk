<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayNotFoundException extends AbacatePayException
{
  public function __construct(
    string $message = 'Resource not found. Please check your request and try again.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      404,
      $previous,
    );
  }
}
