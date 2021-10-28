<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

final class ReceiveOrderBaseShipped extends AbstractCondition
{
    protected string $receive_order_id;
    protected string $receive_order_last_modified_date;

    public function receiveOrderId(string $receiveOrderId): ReceiveOrderBaseShipped
    {
        $this->receive_order_id = $receiveOrderId;

        return $this;
    }

    public function receiveOrderLastModifiedDate(string $receiveOrderLastModifiedDate): ReceiveOrderBaseShipped
    {
        $this->receive_order_last_modified_date = $receiveOrderLastModifiedDate;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_receiveorder_base/shipped';
    }
}
