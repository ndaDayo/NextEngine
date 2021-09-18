<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Fields\ReceiveOrderBaseFields;
use PHPUnit\Framework\TestCase;

class ReceiveOrderBaseTest extends TestCase
{
    public function testFields(): void
    {
        $receiveOrderBaseFields = [
            'receive_order_shop_id',
            'receive_order_id',
            'receive_order_shop_cut_form_id',
        ];

        $fields = new ReceiveOrderBaseFields($receiveOrderBaseFields);

        $receiveOrderBase = new ReceiveOrderBase();
        $receiveOrderBase->fields($fields);

        $expected = ['fields' => 'receive_order_shop_id,receive_order_id,receive_order_shop_cut_form_id'];
        $this->assertSame($expected, $receiveOrderBase->payload());
    }

    public function testWaitFlag(): void
    {
        $receiveOrderBase = new ReceiveOrderBase();
        $receiveOrderBase->waitFlag();

        $expected = ['wait_flag' => 1];
        $this->assertSame($expected, $receiveOrderBase->payload());

        $receiveOrderBase = new ReceiveOrderBase();
        $this->assertArrayNotHasKey('wait_flag', $receiveOrderBase->payload());
    }

    public function testOffset(): void
    {
        $receiveOrderBase = new ReceiveOrderBase();
        $offset = 1;
        $receiveOrderBase->offset($offset);

        $expected = ['offset' => 1];
        $this->assertSame($expected, $receiveOrderBase->payload());
    }

    public function testLimit(): void
    {
        $receiveOrderBase = new ReceiveOrderBase();
        $limit = 100;
        $receiveOrderBase->limit($limit);

        $expected = ['limit' => 100];
        $this->assertSame($expected, $receiveOrderBase->payload());
    }

    public function testToString(): void
    {
        $receiveOrderBase = new ReceiveOrderBase();
        $this->assertSame('/api_v1_receiveorder_base/search', (string) $receiveOrderBase);
    }
}
