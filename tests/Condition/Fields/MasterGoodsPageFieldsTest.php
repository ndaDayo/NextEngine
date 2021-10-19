<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MasterGoodsPageFieldsTest extends TestCase
{
    public function testToString(): void
    {
        $fields = [
            'goods_page_goods_code',
            'goods_page_goods_name',
            'goods_page_display_flag',
        ];

        $fields = new MasterGoodsPageFields($fields);
        $expected = 'goods_page_goods_code,goods_page_goods_name,goods_page_display_flag';

        $this->assertSame($expected, (string) $fields);
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid field:nda');

        $fields = ['nda'];
        new MasterGoodsPageFields($fields);
    }
}
