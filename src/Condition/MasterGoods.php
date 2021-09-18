<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Fields\MasterGoodsFields;

final class MasterGoods extends AbstractCondition
{
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function fields(MasterGoodsFields $fields): MasterGoods
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): MasterGoods
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): MasterGoods
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): MasterGoods
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_master_goods/search';
    }
}
