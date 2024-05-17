<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MasterSetGoodsFieldsTest extends TestCase
{
    public function testToString(): void
    {
        $fields = [
            'set_goods_id',
            'set_goods_representation_id',
            'set_goods_detail_goods_id',
            'set_goods_detail_quantity',
        ];

        $productFields = new MasterSetGoodsFields($fields);
        $expected = 'set_goods_id,set_goods_representation_id,set_goods_detail_goods_id,set_goods_detail_quantity';

        $this->assertSame($expected, (string) $productFields);
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid field:nda');

        $fields = ['nda'];
        new MasterSetGoodsFields($fields);
    }
}
