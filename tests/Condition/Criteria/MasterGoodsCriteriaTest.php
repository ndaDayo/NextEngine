<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Criteria;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MasterGoodsCriteriaTest extends TestCase
{
    public function testPayload(): void
    {
        $criteria = [
            [
                'field' => 'goods_id',
                'operator' => '-eq',
                'parameter' => 1,
            ],
            [
                'field' => 'goods_representation_id',
                'operator' => '-eq',
                'parameter' => 2,
            ],
        ];

        $masterGoodsCriteria = new MasterGoodsCriteria($criteria);

        $expected = [
            'goods_id-eq' => 1,
            'goods_representation_id-eq' => 2,
        ];
        $this->assertSame($expected, $masterGoodsCriteria->payload());
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid operator:=');

        $criteria = [
            [
                'field' => 'goods_id',
                'operator' => '=',
                'parameter' => 1,
            ],
        ];

        new MasterGoodsCriteria($criteria);
    }
}
