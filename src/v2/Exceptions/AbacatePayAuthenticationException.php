<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayAuthenticationException extends AbacatePayException
{
  public function __construct(
    string $message = 'Authentication failed. Please check your credentials and try again.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      401,
      $previous,
    );
  }
}
