<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Contracts\ConditionInterface;

use function array_filter;
use function array_merge;
use function get_object_vars;

abstract class AbstractCondition implements ConditionInterface
{
    public function method(): string
    {
        return self::POST;
    }

    /**
     * {@inheritdoc}
     */
    public function payload(): array
    {
        $vars = get_object_vars($this);
        if (isset($vars['criteria'])) {
            $vars = $this->extractCriteria($vars);
        }

        $callback = static function (mixed $v): bool {
            return $v !== null;
        };

        return array_filter($vars, $callback);
    }

    /**
     * @param array<string, mixed> $vars
     *
     * @return array<string, mixed>
     */
    private function extractCriteria(array $vars): array
    {
        $condition = array_merge($vars, $vars['criteria']);
        unset($condition['criteria']);

        return $condition;
    }
}
