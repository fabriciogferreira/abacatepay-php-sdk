<?php

namespace AbacatePay\v2\ResponseBody;

abstract class ResponseBody
{
  public readonly bool $success;
  public readonly ?string $error;

  /**
   * @param array<string, mixed> $body
   */
  public function __construct(array $body = [])
  {
    $this->success = $body['success'];
    $this->error = $body['error'];
  }
}
