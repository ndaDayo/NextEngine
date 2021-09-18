<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\ValueObjects;

class Token
{
    public function __construct(
        private string $accessToken,
        private string $refreshToken,
    ) {
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
}
