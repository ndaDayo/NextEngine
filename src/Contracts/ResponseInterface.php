<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Contracts;

interface ResponseInterface
{
    public function body(): string;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
