<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Contracts;

use Koriym\HttpConstants\Method;

interface ConditionInterface
{
    public const GET = Method::GET;
    public const POST = Method::POST;

    public function method(): string;

    /**
     * @return array<string, mixed>
     */
    public function payload(): mixed;

    public function __toString(): string;
}
