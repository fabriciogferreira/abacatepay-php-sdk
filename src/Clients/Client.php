<?php

namespace AbacatePay\Clients;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

/**
 * Client class for interacting with the AbacatePay API.
 *
 * This class handles API requests using GuzzleHttp and provides a way to manage
 * authentication and communication with the AbacatePay service.
 */
class Client
{
    /**
     * Base URI for the AbacatePay API.
     */
    public const BASE_URI = 'https://api.abacatepay.com/v1';

    /**
     * API authentication token.
     */
    protected static ?string $token;

    /**
     * Guzzle HTTP client instance.
     */
    private GuzzleHttpClient $client;

    /**
     * Constructor for the Client class.
     *
     * @param string                $uri    the specific API endpoint to interact with
     * @param null|GuzzleHttpClient $client optional GuzzleHttpClient instance for custom configurations
     */
    public function __construct(string $uri, ?GuzzleHttpClient $client = null)
    {
        $this->client = $client ?? new GuzzleHttpClient([
            'base_uri' => self::BASE_URI.'/'.$uri.'/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.self::$token,
            ],
        ]);
    }

    /**
     * Sends an HTTP request to the API.
     *
     * @param string $method  The HTTP method (e.g., GET, POST).
     * @param string $uri     the endpoint URI relative to the base URI
     * @param array<string, mixed>  $options optional settings and parameters for the request
     *
     * @return array<string, mixed> the response data as an associative array
     *
     * @throws \Exception if an error occurs during the request
     */
    public function request(string $method, string $uri, array $options = []): array
    {
        try {
            return json_decode($this->client->request($method, $uri, $options)->getBody(), true)['data'];
        } catch (RequestException $e) {
            $errorMessage = null;

            if ($e->hasResponse()) {
                $errorResponse = json_decode($e->getResponse()->getBody());
                $errorMessage = $errorResponse->message ?? $errorResponse->error;
            }

            throw new \Exception('Request error: '.$errorMessage ?? $e->getMessage(), $e->getCode());
        } catch (\Throwable $e) {
            throw new \Exception('Unexpected error: '.$e->getMessage(), $e->getCode());
        }
    }

    /**
     * Sets the API authentication token.
     *
     * @param string $token the API token to authenticate requests
     */
    public static function setToken(string $token): void
    {
        self::$token = $token;
    }
}
