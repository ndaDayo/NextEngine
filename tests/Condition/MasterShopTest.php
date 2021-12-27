<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Criteria\MasterShopCriteria;
use NdaDayo\NextEngine\Condition\Fields\MasterShopFields;
use PHPUnit\Framework\TestCase;

class MasterShopTest extends TestCase
{
    public function testCriteria(): void
    {
        $criteria = [
            [
                'field' => 'shop_id',
                'operator' => '-eq',
                'parameter' => 1,
            ],
        ];

        $criteria = new MasterShopCriteria($criteria);
        $masterShop = new MasterShop();
        $masterShop->criteria($criteria);

        $expected = ['shop_id-eq' => 1];

        $this->assertEquals($expected, $masterShop->payload());
    }

    public function testFields(): void
    {
        $masterShopFields = [
            'shop_id',
            'shop_name',
        ];

        $fields = new MasterShopFields($masterShopFields);
        $masterShop = new MasterShop();
        $masterShop->fields($fields);

        $expected = ['fields' => 'shop_id,shop_name'];
        $this->assertSame($expected, $masterShop->payload());
    }

    public function testWaitFlag(): void
    {
        $masterShop = new MasterShop();
        $masterShop->waitFlag();
        $expected = ['wait_flag' => 1];
        $this->assertSame($expected, $masterShop->payload());

        $masterShop = new MasterShop();
        $this->assertArrayNotHasKey('wait_flag', $masterShop->payload());
    }

    public function testOffset(): void
    {
        $masterShop = new MasterShop();
        $offset = 1;
        $masterShop->offset($offset);

        $expected = ['offset' => 1];
        $this->assertSame($expected, $masterShop->payload());
    }

    public function testLimit(): void
    {
        $masterShop = new MasterShop();
        $limit = 100;
        $masterShop->limit($limit);

        $expected = ['limit' => 100];
        $this->assertSame($expected, $masterShop->payload());
    }

    public function testToString(): void
    {
        $masterShop = new MasterShop();
        $this->assertSame('/api_v1_master_shop/search', (string) $masterShop);
    }
}
