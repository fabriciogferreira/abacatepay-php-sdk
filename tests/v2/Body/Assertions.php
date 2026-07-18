<?php

use AbacatePay\v2\Body\Body;

/**
 * @param array<string, mixed> $expected
 */
function assertBody(
  Body $body,
  array $expected,
  string $description = '',
): void {
  it('should return the correct body '.$description, function () use ($body, $expected) {
    expect($body->toArray())->toBe($expected);
  });
}

function assertBodyQueryString(
  Body $body,
  string $expected,
  string $description = '',
): void {
  it('should return the correct query string '.$description, function () use ($body, $expected) {
    expect($body->toQueryString())->toBe($expected);
  });
}