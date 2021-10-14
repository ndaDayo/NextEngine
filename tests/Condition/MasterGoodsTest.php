<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterGoodsCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterGoodsFields;
use PHPUnit\Framework\TestCase;

class MasterGoodsTest extends TestCase
{
    public function testCriteria(): void
    {
        $criteria = [
            [
                'field' => 'goods_id',
                'operator' => '-eq',
                'parameter' => 1,
            ],
            [
                'field' => 'goods_representation_id',
                'operator' => '-eq',
                'parameter' => 2,
            ],
        ];

        $criteria = new MasterGoodsCriteria($criteria);
        $masterGoods = new MasterGoods();
        $masterGoods->criteria($criteria);

        $expected = [
            'goods_id-eq' => 1,
            'goods_representation_id-eq' => 2,
        ];

        $this->assertEquals($expected, $masterGoods->payload());
    }

    public function testFields(): void
    {
        $masterGoodsFields = [
            'goods_id',
            'goods_representation_id',
            'goods_name',
        ];

        $fields = new MasterGoodsFields($masterGoodsFields);
        $masterGoods = new MasterGoods();
        $masterGoods->fields($fields);

        $expected = ['fields' => 'goods_id,goods_representation_id,goods_name'];
        $this->assertSame($expected, $masterGoods->payload());
    }

    public function testWaitFlag(): void
    {
        $masterGoods = new MasterGoods();
        $masterGoods->waitFlag();
        $expected = ['wait_flag' => 1];
        $this->assertSame($expected, $masterGoods->payload());

        $masterGoods = new MasterGoods();
        $this->assertArrayNotHasKey('wait_flag', $masterGoods->payload());
    }

    public function testOffset(): void
    {
        $masterGoods = new MasterGoods();
        $offset = 1;
        $masterGoods->offset($offset);

        $expected = ['offset' => 1];
        $this->assertSame($expected, $masterGoods->payload());
    }

    public function testLimit(): void
    {
        $masterGoods = new MasterGoods();
        $limit = 100;
        $masterGoods->limit($limit);

        $expected = ['limit' => 100];
        $this->assertSame($expected, $masterGoods->payload());
    }

    public function testToString(): void
    {
        $masterGoods = new MasterGoods();
        $this->assertSame('/api_v1_master_goods/search', (string) $masterGoods);
    }
}
