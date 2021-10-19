<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterGoodsPageCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterGoodsPageFields;

final class MasterGoodsPage extends AbstractCondition
{
    /** @var array<string, mixed> $criteria */
    protected array $criteria;
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function criteria(MasterGoodsPageCriteria $criteria): MasterGoodsPage
    {
        $this->criteria = $criteria->payload();

        return $this;
    }

    public function fields(MasterGoodsPageFields $fields): MasterGoodsPage
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): MasterGoodsPage
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): MasterGoodsPage
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): MasterGoodsPage
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_master_goods_page/search';
    }
}
