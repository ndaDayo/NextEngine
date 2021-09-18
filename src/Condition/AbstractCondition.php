<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Contracts\ConditionInterface;

use function array_filter;
use function get_object_vars;

abstract class AbstractCondition implements ConditionInterface
{
    public function method(): string
    {
        return self::POST;
    }

    /**
     * {@inheritdoc }
     */
    public function payload(): array
    {
        $callback = static function (mixed $v): bool {
            return $v !== null;
        };

        return array_filter(get_object_vars($this), $callback);
    }
}
