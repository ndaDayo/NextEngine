<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Koriym\HttpConstants\MediaType;
use Koriym\HttpConstants\Method;
use Koriym\HttpConstants\RequestHeader;
use NdaDayo\NextEngine\Contracts\ResponseInterface;
use NdaDayo\NextEngine\Contracts\TokenProviderInterface;
use NdaDayo\NextEngine\ValueObjects\Token;

class NextEngineToken implements TokenProviderInterface
{
    public function __construct(
        private ClientInterface $client,
        private string $clientId,
        private string $clientSecret,
    ) {
    }

    public function redirect(): string
    {
        return 'https://base.next-engine.org/users/sign_in?client_id=' . $this->clientId;
    }

    public function callback(string $uid, string $state): Token
    {
        return $this->mapTokenToObject($this->getTokenResponse($uid, $state));
    }

    private function mapTokenToObject(ResponseInterface $response): Token
    {
        $responseBody = $response->toArray();

        return new Token($responseBody['access_token'], $responseBody['refresh_token']);
    }

    private function getTokenResponse(string $uid, string $state): ResponseInterface
    {
        $response = $this->client->request(
            Method::POST,
            'https://api.next-engine.org/api_neauth',
            $this->requestOptions($uid, $state)
        );

        return new Response($response);
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function requestOptions(string $uid, string $state): array
    {
        return [
            RequestOptions::HEADERS => [RequestHeader::CONTENT_TYPE => MediaType::APPLICATION_FORM_URLENCODED],
            RequestOptions::FORM_PARAMS => [
                'uid' => $uid,
                'state' => $state,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ],
        ];
    }
}
