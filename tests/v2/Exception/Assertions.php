<?php

function assertExceptionCode(
  Exception $exception,
  int $expectedCode,
): void {
  it('default code is ' . $expectedCode, function () use ($exception, $expectedCode) {
    $retrievedCode = $exception->getCode();
    expect($retrievedCode)->toBe($expectedCode);
  });
}

function assertExceptionMessage(
  Exception $exception,
  string $expectedMessage,
): void {
  it('default message is ' . $expectedMessage, function () use ($exception, $expectedMessage) {
    $retrievedMessage = $exception->getMessage();
    expect($retrievedMessage)->toBe($expectedMessage);
  });
}

function assertExceptionPrevious(
  Exception $exception,
  ?Exception $expectedPrevious,
): void {
  $name = $expectedPrevious ? $expectedPrevious::class : null;
  it('default previous is ' . $name, function () use ($exception, $expectedPrevious) {
    $retrievedPrevious = $exception->getPrevious();

    if ($expectedPrevious === null) {
      expect($retrievedPrevious)->toBeNull();

      return;
    }

    expect($retrievedPrevious)
      ->toBeInstanceOf(Exception::class)
      ->and($retrievedPrevious->getMessage())->toBe($expectedPrevious->getMessage());
  });
}