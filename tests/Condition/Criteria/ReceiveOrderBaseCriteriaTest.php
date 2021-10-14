<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Criteria;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ReceiveOrderBaseCriteriaTest extends TestCase
{
    public function testPayload(): void
    {
        $criteria = [
            [
                'field' => 'receive_order_shop_id',
                'operator' => '-eq',
                'parameter' => 1,
            ],
            [
                'field' => 'receive_order_id',
                'operator' => '-eq',
                'parameter' => 2,
            ],
        ];

        $receiveOrderBaseCriteria = new ReceiveOrderBaseCriteria($criteria);

        $expected = [
            'receive_order_shop_id-eq' => 1,
            'receive_order_id-eq' => 2,
        ];
        $this->assertSame($expected, $receiveOrderBaseCriteria->payload());
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid operator:=');

        $criteria = [
            [
                'field' => 'receive_order_id',
                'operator' => '=',
                'parameter' => 1,
            ],
        ];

        new ReceiveOrderBaseCriteria($criteria);
    }
}
