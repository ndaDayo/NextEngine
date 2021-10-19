<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterGoodsPageVariationCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterGoodsPageVariationFields;

final class MasterGoodsPageVariation extends AbstractCondition
{
    /** @var array<string, mixed> $criteria */
    protected array $criteria;
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function criteria(MasterGoodsPageVariationCriteria $criteria): MasterGoodsPageVariation
    {
        $this->criteria = $criteria->payload();

        return $this;
    }

    public function fields(MasterGoodsPageVariationFields $fields): MasterGoodsPageVariation
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): MasterGoodsPageVariation
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): MasterGoodsPageVariation
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): MasterGoodsPageVariation
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_master_goods_page_variation/search';
    }
}
