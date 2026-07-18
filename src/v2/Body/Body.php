<?php

namespace AbacatePay\v2\Body;

class Body
{
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
