<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayAuthorizationException extends AbacatePayException
{
  public function __construct(
    string $message = 'You are not authorized to access this resource.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      403,
      $previous,
    );
  }
}
