<?php

namespace AbacatePay\v2\RequestData;

class RequestData
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
