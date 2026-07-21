<?php

declare(strict_types=1);

namespace AbacatePay\v2\Exceptions;

final class AbacatePayNetworkException extends AbacatePayException
{
  public function __construct(
    string $message = 'A network error occurred while communicating with the AbacatePay API.',
    ?\Throwable $previous = null,
  ) {
    parent::__construct(
      $message,
      0,
      $previous,
    );
  }
}
