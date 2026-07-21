<?php

namespace AbacatePay\v2\RequestData\Customer;

use AbacatePay\v2\RequestData\RequestData;

class CustomerCreateRequestData extends RequestData
{
  private string $email;
  private ?string $name = null;
  private ?string $cellphone = null;
  private ?string $taxId = null;
  private ?string $zipCode = null;

  /** @var array<string, mixed> */
  private ?array $metadata = null;

  public static function make(
    string $email,
  ): self {
    $customerCreateRequestData = new self();

    $customerCreateRequestData->email = $email;

    return $customerCreateRequestData;
  }

  public function name(
    string $name,
  ): static {
    $this->name = $name;

    return $this;
  }

  public function cellphone(
    string $cellphone,
  ): static {
    $this->cellphone = $cellphone;

    return $this;
  }

  public function taxId(
    string $taxId,
  ): static {
    $this->taxId = $taxId;

    return $this;
  }

  public function zipCode(
    string $zipCode,
  ): static {
    $this->zipCode = $zipCode;

    return $this;
  }

  /**
   * @param array<string, mixed> $metadata
   */
  public function metadata(
    array $metadata,
  ): static {
    $this->metadata = $metadata;

    return $this;
  }

  /**
   * @return array<string, mixed>
   */
  public function toArray(): array
  {
    return array_filter([
      'email' => $this->email,
      'name' => $this->name,
      'cellphone' => $this->cellphone,
      'taxId' => $this->taxId,
      'zipCode' => $this->zipCode,
      'metadata' => $this->metadata,
    ], static fn ($value) => null !== $value);
  }
}
