<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use PHPUnit\Framework\TestCase;

class ReceiveOrderBaseShippedTest extends TestCase
{
    public function testReceiveOrderId(): void
    {
        $expected = ['receive_order_id' => '1'];
        $receiveOrderBaseUpdate = new ReceiveOrderBaseShipped();
        $receiveOrderBaseUpdate->receiveOrderId('1');

        $this->assertSame($expected, $receiveOrderBaseUpdate->payload());
    }

    public function testReceiveOrderLastModifiedDate(): void
    {
        $expected = ['receive_order_last_modified_date' => '2021-10-18 17:53:55'];
        $receiveOrderBaseUpdate = new ReceiveOrderBaseShipped();
        $receiveOrderBaseUpdate->receiveOrderLastModifiedDate('2021-10-18 17:53:55');

        $this->assertSame($expected, $receiveOrderBaseUpdate->payload());
    }

    public function testToString(): void
    {
        $receiveOrderBaseUpdate = new ReceiveOrderBaseShipped();

        $this->assertSame('/api_v1_receiveorder_base/shipped', (string) $receiveOrderBaseUpdate);
    }
}
