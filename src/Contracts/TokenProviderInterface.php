<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Contracts;

use NdaDayo\NextEngine\ValueObjects\Token;

interface TokenProviderInterface
{
    public function redirect(): string;

    public function callback(string $uid, string $state): Token;
}
