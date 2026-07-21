<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayApiException extends AbacatePayException
{
  public function __construct(
    string $message = 'An API error occurred while communicating with the AbacatePay API.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      500,
      $previous,
    );
  }
}
