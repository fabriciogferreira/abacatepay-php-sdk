<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayRateLimitException extends AbacatePayException
{
  public function __construct(
    string $message = 'Rate limit exceeded. Please try again later.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      429,
      $previous,
    );
  }
}
