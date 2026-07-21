<?php

namespace AbacatePay\v2\Clients;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use AbacatePay\v2\Exceptions\AbacatePayException;
use AbacatePay\v2\Exceptions\AbacatePayApiException;
use AbacatePay\v2\Exceptions\AbacatePayNetworkException;
use AbacatePay\v2\Exceptions\AbacatePayNotFoundException;
use AbacatePay\v2\Exceptions\AbacatePayRateLimitException;
use AbacatePay\v2\Exceptions\AbacatePayValidationException;
use AbacatePay\v2\Exceptions\AbacatePayAuthorizationException;
use AbacatePay\v2\Exceptions\AbacatePayAuthenticationException;
use AbacatePay\v2\Exceptions\AbacatePayInvalidRequestException;

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
   * @throws AbacatePayException if an error occurs during the request
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

      $body = $response->getBody();

      $body = json_decode($body, true);

      return $body;
    } catch (RequestException $e) {
      $this->handleException($e);
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

  public function subscriptions(): SubscriptionClient
  {
    return new SubscriptionClient($this);
  }

  /**
   * @throws AbacatePayNetworkException
   * @throws AbacatePayValidationException
   * @throws AbacatePayInvalidRequestException
   * @throws AbacatePayAuthorizationException
   * @throws AbacatePayAuthenticationException
   * @throws AbacatePayRateLimitException
   * @throws AbacatePayNotFoundException
   * @throws AbacatePayApiException
   */
  public function handleException(
    RequestException $requestException
  ): never {
    $response = $requestException->getResponse();

    if (!$response) {
      throw new AbacatePayNetworkException(
        $requestException->getMessage(),
        $requestException
      );
    }
    
    $statusCode = $response->getStatusCode();

    $body = $response->getBody();

    $contents = $body->getContents();

    $contents = json_decode($contents, true);

    $message = $contents['error'] ?? 'An unknown error occurred';

    match ($statusCode) {
      422 => throw new AbacatePayValidationException(
        $message,
        $requestException
      ),
      400 => throw new AbacatePayInvalidRequestException(
        $message,
        $requestException
      ),
      403 => throw new AbacatePayAuthorizationException(
        $message,
        $requestException
      ),
      401 => throw new AbacatePayAuthenticationException(
        $message,
        $requestException
      ),
      429 => throw new AbacatePayRateLimitException(
        $message,
        $requestException
      ),
      404 => throw new AbacatePayNotFoundException(
        $message,
        $requestException
      ),
      default => throw new AbacatePayApiException(
        $message,
        $requestException
      ),
    };
  }
}
