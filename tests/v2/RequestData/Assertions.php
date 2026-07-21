<?php

use AbacatePay\v2\RequestData\RequestData;

/**
 * @param array<string, mixed> $expected
 */
function assertRequestData(
  RequestData $requestData,
  array $expected,
  string $description = '',
): void {
  it('should return the correct requestData '.$description, function () use ($requestData, $expected) {
    expect($requestData->toArray())->toBe($expected);
  });
}

function assertRequestDataQueryString(
  RequestData $requestData,
  string $expected,
  string $description = '',
): void {
  it('should return the correct query string '.$description, function () use ($requestData, $expected) {
    expect($requestData->toQueryString())->toBe($expected);
  });
}