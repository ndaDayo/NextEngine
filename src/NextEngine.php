<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Koriym\HttpConstants\MediaType;
use Koriym\HttpConstants\RequestHeader;
use NdaDayo\NextEngine\Contracts\ConditionInterface;
use NdaDayo\NextEngine\Contracts\NextEngineInterface;
use NdaDayo\NextEngine\Contracts\ResponseInterface;
use NdaDayo\NextEngine\Exception\ClientException;
use Throwable;

use function array_merge;

class NextEngine implements NextEngineInterface
{
    public function __construct(
        private ClientInterface $client,
        private string $accessToken,
        private ?string $refreshToken = null,
    ) {
    }

    public function __invoke(ConditionInterface $condition): ResponseInterface
    {
        try {
            $response = $this->client->request(
                $condition->method(),
                'https://api.next-engine.org' . $condition,
                $this->requestOptions($condition)
            );

            return new Response($response);
        } catch (Throwable $e) {
            throw new ClientException($e->getMessage(), (int) $e->getCode());
        }
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function requestOptions(ConditionInterface $condition): array
    {
        return [
            RequestOptions::HEADERS => [RequestHeader::CONTENT_TYPE => MediaType::APPLICATION_FORM_URLENCODED],
            RequestOptions::FORM_PARAMS => $this->formParams($condition),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function formParams(ConditionInterface $condition): array
    {
        $params = array_merge(['access_token' => $this->accessToken], $condition->payload());
        if ($this->refreshToken === null) {
            return $params;
        }

        return array_merge($params, ['refresh_token' => $this->refreshToken]);
    }
}
