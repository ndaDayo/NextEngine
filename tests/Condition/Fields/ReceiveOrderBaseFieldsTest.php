<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ReceiveOrderBaseFieldsTest extends TestCase
{
    public function testToString(): void
    {
        $fields = [
            'receive_order_shop_id',
            'receive_order_id',
            'receive_order_shop_cut_form_id',
        ];

        $receiveOrderBaseFields = new ReceiveOrderBaseFields($fields);
        $expected = 'receive_order_shop_id,receive_order_id,receive_order_shop_cut_form_id';

        $this->assertSame($expected, (string) $receiveOrderBaseFields);
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid field:nda');

        $fields = ['nda'];
        new ReceiveOrderBaseFields($fields);
    }
}
