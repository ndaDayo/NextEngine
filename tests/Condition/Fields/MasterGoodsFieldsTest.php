<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MasterGoodsFieldsTest extends TestCase
{
    public function testToString(): void
    {
        $fields = [
            'goods_id',
            'goods_representation_id',
            'goods_delivery_name',
        ];

        $productFields = new MasterGoodsFields($fields);
        $expected = 'goods_id,goods_representation_id,goods_delivery_name';

        $this->assertSame($expected, (string) $productFields);
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid field:nda');

        $fields = ['nda'];
        new MasterGoodsFields($fields);
    }
}
