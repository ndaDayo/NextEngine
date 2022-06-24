<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition;

use PHPUnit\Framework\TestCase;

class ReceiveOrderBaseUpdateTest extends TestCase
{
    public function testReceiveOrderId(): void
    {
        $expected = ['receive_order_id' => '2345'];
        $receiveOrderBaseUpdate = new ReceiveOrderBaseUpdate();
        $receiveOrderBaseUpdate->receiveOrderId('2345');

        $this->assertSame($expected, $receiveOrderBaseUpdate->payload());
    }

    public function testReceiveOrderLastModifiedDate(): void
    {
        $expected = ['receive_order_last_modified_date' => '2021-10-18 17:53:55'];
        $receiveOrderBaseUpdate = new ReceiveOrderBaseUpdate();
        $receiveOrderBaseUpdate->receiveOrderLastModifiedDate('2021-10-18 17:53:55');

        $this->assertSame($expected, $receiveOrderBaseUpdate->payload());
    }

    public function data(): void
    {
        $xmlstr = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<root>
<receiveorder_base>
<receive_order_delivery_cut_form_id>1234567890</receive_order_delivery_cut_form_id>
</receiveorder_base>
</root>
XML;
        $expected = ['data' => $xmlstr];
        $receiveOrderBaseUpdate = new ReceiveOrderBaseUpdate();
        $receiveOrderBaseUpdate->data($xmlstr);

        $this->assertSame($expected, $receiveOrderBaseUpdate->payload());
    }

    public function testToString(): void
    {
        $receiveOrderBaseUpdate = new ReceiveOrderBaseUpdate();

        $this->assertSame('/api_v1_receiveorder_base/update', (string) $receiveOrderBaseUpdate);
    }
}
