<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Fields\ReceiveOrderRowFields;

final class ReceiveOrderRow extends AbstractCondition
{
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function fields(ReceiveOrderRowFields $fields): ReceiveOrderRow
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): ReceiveOrderRow
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): ReceiveOrderRow
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): ReceiveOrderRow
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_receiveorder_row/search';
    }
}
