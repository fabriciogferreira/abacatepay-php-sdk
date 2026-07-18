<?php

namespace AbacatePay\Resources\Billing;

use AbacatePay\Resources\Resource;

/**
 * Represents a product in a billing resource in the AbacatePay system.
 *
 * This class contains information about a product, such as its identifier, name, description,
 * quantity, and price.
 */
class Product extends Resource
{
    /**
     * External identifier for the product.
     */
    public ?string $external_id;

    /**
     * Internal identifier for the product in the system.
     */
    public ?string $product_id;

    /**
     * Name of the product.
     */
    public ?string $name;

    /**
     * Description of the product.
     */
    public ?string $description;

    /**
     * Quantity of the product.
     */
    public ?int $quantity;

    /**
     * Price of the product in the smallest currency unit (e.g., cents).
     */
    public ?int $price;

    /**
     * Constructor for the Product class.
     *
     * Initializes the Product object with the provided data.
     *
     * @param array<string, mixed> $data an associative array of product properties
     */
    public function __construct(array $data)
    {
        $this->__fill($this, $data);
    }
}
