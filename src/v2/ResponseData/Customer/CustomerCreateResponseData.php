<?php

namespace AbacatePay\v2\ResponseData\Customer;

use AbacatePay\v2\ResponseData\ResponseData;

class CustomerCreateResponseData extends ResponseData
{
  private function __construct(
    public readonly string $id,
    public readonly string $email,
    public readonly ?string $name,
    public readonly ?string $cellphone,
    public readonly ?string $taxId,
    public readonly ?string $zipCode,
    /** @var null|array<string, mixed> */
    public readonly ?array $metadata,
  ) {}

  /**
   * @param array<string, mixed> $data
   */
  public static function fromArray(array $data): self
  {
    return new self(
      id: $data['id'],
      email: $data['email'],
      name: $data['name'] ?? null,
      cellphone: $data['cellphone'] ?? null,
      taxId: $data['taxId'] ?? null,
      zipCode: $data['zipCode'] ?? null,
      metadata: $data['metadata'] ?? null,
    );
  }
}
