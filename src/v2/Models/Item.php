<?php

namespace AbacatePay\v2\Models;

class Item
{
private string $id;
  private int $quantity;

  public static function make(
    string $id,
    int $quantity,
  ): self {
    $item = new self();

    $item->id = $id;
    $item->quantity = $quantity;

    return $item;
  }

  /**
   * @param array<string, mixed> $data
   */
  public static function fromArray(array $data): self
  {
    return self::make(
      $data['id'],
      $data['quantity'],
    );
  }

  /**
   * @return array{id: string, quantity: int}
   */
  public function toArray(): array
  {
    return [
      'id' => $this->id,
      'quantity' => $this->quantity,
    ];
  }
}
