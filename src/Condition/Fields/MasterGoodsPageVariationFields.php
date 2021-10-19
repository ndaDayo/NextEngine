<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

class MasterGoodsPageVariationFields extends AbstractFields
{
    /** @var array<int, string> $validFields */
    protected static array $validFields = [
        'goods_page_goods_code',
        'goods_page_v_horizontal_name',
        'goods_page_v_horizontal_value',
        'goods_page_v_vertical_name',
        'goods_page_v_vertical_value',
        'goods_page_v_display_order',
        'goods_page_v_creation_date',
        'goods_page_v_creator_id',
        'goods_page_v_creator_name',
        'goods_page_v_last_modified_date',
        'goods_page_v_last_modified_by_id',
        'goods_page_v_last_modified_by_name',
    ];
}
