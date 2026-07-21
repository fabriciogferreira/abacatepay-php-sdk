<?php

namespace AbacatePay\v2\RequestData;

class RequestData
{
  /** @var null|array<string, mixed> */
  public ?array $data;
  public bool $success;
  public ?string $error;

  public function toQueryString(): string {
    return '';
  }

  /**
   * @return array<string, mixed>
   */
  public function toArray(): array {
    return [];
  }
}
