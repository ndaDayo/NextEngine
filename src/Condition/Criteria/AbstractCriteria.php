<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Criteria;

use InvalidArgumentException;

use function in_array;

abstract class AbstractCriteria implements CriteriaInterface
{
    /** @var array<int, array<string, mixed>> $criteria */
    protected array $criteria;

    /**
     * @param array<int, array<string, mixed>> $criteria
     */
    public function __construct(array $criteria)
    {
        $this->throwInvalidOperatorException($criteria);
        $this->criteria = $criteria;
    }

    /**
     * @param array<int, array<string, mixed>> $criteria
     */
    protected function throwInvalidOperatorException(array $criteria): void
    {
        foreach ($criteria as $value) {
            if (! in_array($value['operator'], static::$validOperators, true)) {
                throw new InvalidArgumentException('invalid operator:' . $value['operator']);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function payload(): array
    {
        $criteria = [];
        foreach ($this->criteria as $value) {
            $criteria[$value['field'] . $value['operator']] = $value['parameter'];
        }

        return $criteria;
    }

    /** @var array<int, string> $validOperators */
    protected static array $validOperators = [
        '-eq',
        '-neq',
        '-lt',
        '-gt',
        '-gte',
        '-in',
        '-nin',
        '-nlike',
        '-nlikeornull',
        '-blank',
        '-nblank',
        '-null',
        '-nnull',
    ];
}
