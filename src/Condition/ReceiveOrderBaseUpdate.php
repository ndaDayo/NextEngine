<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

final class ReceiveOrderBaseUpdate extends AbstractCondition
{
    protected string $receive_order_id;
    protected string $receive_order_last_modified_date;
    protected string $data;

    public function receiveOrderId(string $receiveOrderId): ReceiveOrderBaseUpdate
    {
        $this->receive_order_id = $receiveOrderId;

        return $this;
    }

    public function receiveOrderLastModifiedDate(string $receiveOrderLastModifiedDate): ReceiveOrderBaseUpdate
    {
        $this->receive_order_last_modified_date = $receiveOrderLastModifiedDate;

        return $this;
    }

    public function data(string $data): ReceiveOrderBaseUpdate
    {
        $this->data = $data;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_receiveorder_base/update';
    }
}
