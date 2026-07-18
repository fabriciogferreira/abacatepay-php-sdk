<?php

namespace AbacatePay\Resources\Customer;

use AbacatePay\Resources\Resource;

/**
 * Represents metadata for a customer in the AbacatePay system.
 *
 * This class contains additional information about a customer, such as their name,
 * contact details, and tax identification number.
 */
class Metadata extends Resource
{
    /**
     * Customer's name.
     */
    public ?string $name;

    /**
     * Customer's cellphone number.
     */
    public ?string $cellphone;

    /**
     * Customer's email address.
     */
    public ?string $email;

    /**
     * Customer's tax identification number.
     */
    public ?string $tax_id;

    /**
     * Constructor for the Metadata class.
     *
     * Initializes the Metadata object with the provided data.
     *
     * @param array $data an associative array of metadata properties
     */
    public function __construct(array $data)
    {
        $this->__fill($this, $data);
    }
}
