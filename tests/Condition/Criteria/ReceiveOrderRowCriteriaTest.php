<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Criteria;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ReceiveOrderRowCriteriaTest extends TestCase
{
    public function testPayload(): void
    {
        $criteria = [
            [
                'field' => 'receive_order_row_receive_order_id',
                'operator' => '-eq',
                'parameter' => 1,
            ],
            [
                'field' => 'receive_order_row_goods_id',
                'operator' => '-eq',
                'parameter' => 2,
            ],
        ];

        $receiveOrderRowCriteria = new ReceiveOrderRowCriteria($criteria);

        $expected = [
            'receive_order_row_receive_order_id-eq' => 1,
            'receive_order_row_goods_id-eq' => 2,
        ];
        $this->assertSame($expected, $receiveOrderRowCriteria->payload());
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid operator:=');

        $criteria = [
            [
                'field' => 'receive_order_row_receive_order_id',
                'operator' => '=',
                'parameter' => 1,
            ],
        ];

        new ReceiveOrderRowCriteria($criteria);
    }
}
