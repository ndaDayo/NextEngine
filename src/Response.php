<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine;

use NdaDayo\NextEngine\Contracts\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

use function json_decode;

class Response implements ResponseInterface
{
    /** @var PsrResponseInterface $response */
    private $response;

    public function __construct(PsrResponseInterface $response)
    {
        $this->response = $response;
    }

    public function body(): string
    {
        return (string) $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return json_decode($this->body(), true);
    }
}
