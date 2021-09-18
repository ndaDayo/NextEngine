<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ReceiveOrderRowFieldsTest extends TestCase
{
    public function testToString(): void
    {
        $fields = [
            'receive_order_row_receive_order_id',
            'receive_order_row_shop_cut_form_id',
            'receive_order_row_shop_row_no',
        ];
        $receiveOrderRowFields = new ReceiveOrderRowFields($fields);

        $expected = 'receive_order_row_receive_order_id,receive_order_row_shop_cut_form_id,receive_order_row_shop_row_no';

        $this->assertSame($expected, (string) $receiveOrderRowFields);
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid field:nda');

        $fields = ['nda'];
        new ReceiveOrderRowFields($fields);
    }
}
