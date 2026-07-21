<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayInvalidRequestException extends AbacatePayException
{
  public function __construct(
    string $message = 'Invalid request. Please check your request and try again.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      400,
      $previous,
    );
  }
}
