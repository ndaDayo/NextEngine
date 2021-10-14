<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\ReceiveOrderBaseCriteria;
use NdaDayo\NextEngine\Condition\Fields\ReceiveOrderBaseFields;

final class ReceiveOrderBase extends AbstractCondition
{
    /** @var array<string, mixed> $criteria */
    protected array $criteria;
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function criteria(ReceiveOrderBaseCriteria $criteria): ReceiveOrderBase
    {
        $this->criteria = $criteria->payload();

        return $this;
    }

    public function fields(ReceiveOrderBaseFields $fields): ReceiveOrderBase
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): ReceiveOrderBase
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): ReceiveOrderBase
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): ReceiveOrderBase
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_receiveorder_base/search';
    }
}
