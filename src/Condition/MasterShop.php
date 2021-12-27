<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterShopCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterShopFields;

final class MasterShop extends AbstractCondition
{
    /** @var array<string, mixed> $criteria */
    protected array $criteria;
    protected string $fields;
    protected int $wait_flag;
    protected int $offset;
    protected int $limit;

    public function criteria(MasterShopCriteria $criteria): MasterShop
    {
        $this->criteria = $criteria->payload();

        return $this;
    }

    public function fields(MasterShopFields $fields): MasterShop
    {
        $this->fields = (string) $fields;

        return $this;
    }

    public function waitFlag(): MasterShop
    {
        $this->wait_flag = 1;

        return $this;
    }

    public function offset(int $offset): MasterShop
    {
        $this->offset = $offset;

        return $this;
    }

    public function limit(int $limit): MasterShop
    {
        $this->limit = $limit;

        return $this;
    }

    public function __toString(): string
    {
        return '/api_v1_master_shop/search';
    }
}
