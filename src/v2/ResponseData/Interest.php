<?php

namespace AbacatePay\v2\ResponseData;

class Interest
{
  private function __construct(
    public readonly int $value,
  ) {}

  /**
   * @param array<string, mixed> $data
   */
  public static function fromArray(array $data): self
  {
    return new self(
      value: $data['value'],
    );
  }
}
