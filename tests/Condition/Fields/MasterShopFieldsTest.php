<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MasterShopFieldsTest extends TestCase
{
    public function testToString(): void
    {
        $fields = [
            'shop_id',
            'shop_name',
        ];

        $shopFields = new MasterShopFields($fields);
        $expected = 'shop_id,shop_name';

        $this->assertSame($expected, (string) $shopFields);
    }

    public function testFieldException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid field:nda');

        $fields = ['nda'];
        new MasterShopFields($fields);
    }
}
