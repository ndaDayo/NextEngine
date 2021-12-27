<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

class MasterShopFields extends AbstractFields
{
    /** @var array<int, string> $validFields */
    protected static array $validFields = [
        'shop_id',
        'shop_name',
        'shop_kana',
        'shop_abbreviated_name',
        'shop_handling_goods_name',
        'shop_close_date',
        'shop_note',
        'shop_mall_id',
        'shop_authorization_type_id',
        'shop_authorization_type_name',
        'shop_tax_id',
        'shop_tax_name',
        'shop_currency_unit_id',
        'shop_currency_unit_name',
        'shop_tax_calculation_sequence_id',
        'shop_type_id',
        'shop_deleted_flag',
        'shop_creation_date',
        'shop_last_modified_date',
        'shop_last_modified_null_safe_date',
        'shop_creator_id',
        'shop_creator_name',
        'shop_last_modified_by_id',
        'shop_last_modified_by_null_safe_id',
        'shop_last_modified_by_name',
        'shop_last_modified_by_null_safe_name',
    ];
}
