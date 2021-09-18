<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use NdaDayo\NextEngine\Condition\Fields\ReceiveOrderRowFields;
use PHPUnit\Framework\TestCase;

class ReceiveOrderRowTest extends TestCase
{
    public function testFields(): void
    {
        $receiveOrderRowFields = [
            'receive_order_row_receive_order_id',
            'receive_order_row_shop_cut_form_id',
        ];

        $fields = new ReceiveOrderRowFields($receiveOrderRowFields);

        $receiveOrderRow = new ReceiveOrderRow();
        $receiveOrderRow->fields($fields);
        $expected = ['fields' => 'receive_order_row_receive_order_id,receive_order_row_shop_cut_form_id'];

        $this->assertEquals($expected, $receiveOrderRow->payload());
    }

    public function testWaitFlag(): void
    {
        $receiveOrderRow = new ReceiveOrderRow();
        $receiveOrderRow->waitFlag();

        $expected = ['wait_flag' => 1];
        $this->assertSame($expected, $receiveOrderRow->payload());

        $receiveOrderRow = new ReceiveOrderRow();
        $this->assertArrayNotHasKey('wait_flag', $receiveOrderRow->payload());
    }

    public function testOffset(): void
    {
        $receiveOrderRow = new ReceiveOrderRow();
        $offset = 1;
        $receiveOrderRow->offset($offset);

        $expected = ['offset' => 1];
        $this->assertSame($expected, $receiveOrderRow->payload());
    }

    public function testLimit(): void
    {
        $receiveOrderRow = new ReceiveOrderRow();
        $limit = 100;
        $receiveOrderRow->limit($limit);

        $expected = ['limit' => 100];
        $this->assertSame($expected, $receiveOrderRow->payload());
    }

    public function testToString(): void
    {
        $receiveOrderRow = new ReceiveOrderRow();
        $this->assertSame('/api_v1_receiveorder_row/search', (string) $receiveOrderRow);
    }
}
