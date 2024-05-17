<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterSetGoodsCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterSetGoodsFields;

final class MasterSetGoods extends AbstractCondition
{
    /** @var array<string, mixed> $criteria */
    protected array $criteria;
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function criteria(MasterSetGoodsCriteria $criteria): MasterSetGoods
    {
        $this->criteria = $criteria->payload();

        return $this;
    }

    public function fields(MasterSetGoodsFields $fields): MasterSetGoods
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): MasterSetGoods
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): MasterSetGoods
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): MasterSetGoods
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_master_setgoods/search';
    }
}
