<?php

namespace AbacatePay\v2\Body;

class Response
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
