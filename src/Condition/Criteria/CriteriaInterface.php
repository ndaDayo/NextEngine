<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Criteria;

interface CriteriaInterface
{
    /**
     * @return array<string, mixed>
     */
    public function payload(): array;
}
