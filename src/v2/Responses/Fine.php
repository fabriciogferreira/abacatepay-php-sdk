<?php

namespace AbacatePay\v2\Responses;

class Fine
{
  private function __construct(
    public readonly int $value,
    public readonly string $type,
  ) {}

  /**
   * @param array<string, mixed> $data
   */
  public static function fromArray(array $data): self
  {
    return new self(
      value: $data['value'],
      type: $data['type'],
    );
  }
}
