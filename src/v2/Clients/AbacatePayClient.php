<?php

namespace AbacatePay\v2\Clients;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

/**
 * Client class for interacting with the AbacatePay API.
 *
 * This class handles API requests using GuzzleHttp and provides a way to manage
 * authentication and communication with the AbacatePay service.
 */
class AbacatePayClient
{
  /**
   * Base URI for the AbacatePay API.
   */
  public const BASE_URI = 'https://api.abacatepay.com/v2/';

  /**
   * Guzzle HTTP client instance.
   */
  private GuzzleHttpClient $client;

  /**
   * Constructor for the Client class.
   *
   * @param string                $token  the specific API endpoint to interact with
   * @param null|GuzzleHttpClient $client optional GuzzleHttpClient instance for custom configurations
   */
  public function __construct(string $token, ?GuzzleHttpClient $client = null)
  {
    $guzzleHttpClient = new GuzzleHttpClient([
      'base_uri' => self::BASE_URI,
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.$token,
      ],
    ]);

    $this->client = $client ?? $guzzleHttpClient;
  }

  /**
   * Sends an HTTP request to the API.
   *
   * @param string               $method  The HTTP method (e.g., GET, POST).
   * @param string               $uri     the endpoint URI relative to the base URI
   * @param array<string, mixed> $options optional settings and parameters for the request
   *
   * @return array<string, mixed> the response data as an associative array
   *
   * @throws \Exception if an error occurs during the request
   */
  public function request(
    string $method,
    string $uri,
    array $options = []
  ): array {
    try {
      $response = $this->client->request(
        $method,
        $uri,
        $options
      );

      $body = json_decode($response->getBody(), true);

      return $body['data'];
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
   * @param array<string, mixed> $options
   *
   * @return array<string, mixed>
   */
  public function get(string $uri, array $options = []): array
  {
    return $this->request('GET', $uri, $options);
  }

  /**
   * @param array<string, mixed> $options
   *
   * @return array<string, mixed>
   */
  public function post(string $uri, array $options = []): array
  {
    return $this->request('POST', $uri, $options);
  }

  /**
   * @param array<string, mixed> $options
   *
   * @return array<string, mixed>
   */
  public function put(string $uri, array $options = []): array
  {
    return $this->request('PUT', $uri, $options);
  }

  /**
   * @param array<string, mixed> $options
   *
   * @return array<string, mixed>
   */
  public function delete(string $uri, array $options = []): array
  {
    return $this->request('DELETE', $uri, $options);
  }

  public function customers(): CustomerClient
  {
    return new CustomerClient($this);
  }
}
