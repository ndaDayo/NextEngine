<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterSetGoodsCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterSetGoodsFields;
use PHPUnit\Framework\TestCase;

class MasterSetGoodsTest extends TestCase
{
    public function testCriteria(): void
    {
        $criteria = [
            [
                'field' => 'set_goods_id',
                'operator' => '-eq',
                'parameter' => 1,
            ],
            [
                'field' => 'set_goods_detail_goods_id',
                'operator' => '-eq',
                'parameter' => 2,
            ],
            [
                'field' => 'set_goods_detail_quantity',
                'operator' => '-eq',
                'parameter' => 3,
            ],
        ];

        $criteria = new MasterSetGoodsCriteria($criteria);
        $masterSetGoods = new MasterSetGoods();
        $masterSetGoods->criteria($criteria);

        $expected = [
            'set_goods_id-eq' => 1,
            'set_goods_detail_goods_id-eq' => 2,
            'set_goods_detail_quantity-eq' => 3,
        ];

        $this->assertEquals($expected, $masterSetGoods->payload());
    }

    public function testFields(): void
    {
        $masterSetGoodsFields = [
            'set_goods_id',
            'set_goods_detail_goods_id',
            'set_goods_detail_quantity',
        ];

        $fields = new MasterSetGoodsFields($masterSetGoodsFields);
        $masterSetGoods = new MasterSetGoods();
        $masterSetGoods->fields($fields);

        $expected = ['fields' => 'set_goods_id,set_goods_detail_goods_id,set_goods_detail_quantity'];
        $this->assertSame($expected, $masterSetGoods->payload());
    }

    public function testWaitFlag(): void
    {
        $masterSetGoods = new MasterSetGoods();
        $masterSetGoods->waitFlag();
        $expected = ['wait_flag' => 1];
        $this->assertSame($expected, $masterSetGoods->payload());

        $masterSetGoods = new MasterSetGoods();
        $this->assertArrayNotHasKey('wait_flag', $masterSetGoods->payload());
    }

    public function testOffset(): void
    {
        $masterSetGoods = new MasterSetGoods();
        $offset = 1;
        $masterSetGoods->offset($offset);

        $expected = ['offset' => 1];
        $this->assertSame($expected, $masterSetGoods->payload());
    }

    public function testLimit(): void
    {
        $masterSetGoods = new MasterSetGoods();
        $limit = 100;
        $masterSetGoods->limit($limit);

        $expected = ['limit' => 100];
        $this->assertSame($expected, $masterSetGoods->payload());
    }

    public function testToString(): void
    {
        $masterSetGoods = new MasterSetGoods();
        $this->assertSame('/api_v1_master_setgoods/search', (string) $masterSetGoods);
    }
}
