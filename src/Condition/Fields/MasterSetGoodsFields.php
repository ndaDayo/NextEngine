<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

class MasterSetGoodsFields extends AbstractFields
{
    /** @var array<int, string> $validFields */
    protected static array $validFields = [
        'set_goods_id',
        'set_goods_name',
        'set_goods_selling_price',
        'set_goods_detail_goods_id',
        'set_goods_detail_quantity',
        'set_goods_representation_id',
        'set_goods_tax_rate',
        'set_goods_jan_code',
        'set_goods_foreign_name',
        'set_goods_display_price',
        'set_goods_tax_id',
        'set_goods_model_number',
        'set_goods_location',
        'set_goods_gift_ok_flg',
        'set_goods_size',
        'set_goods_maker_model_number',
        'set_goods_condition_id',
        'set_goods_condition_description',
        'set_goods_width',
        'set_goods_length',
        'set_goods_height',
        'set_goods_weight',
        'set_goods_same_day_delivery_id',
        'set_goods_option_noshi_id',
        'set_goods_color',
        'set_goods_brand_name',
        'set_goods_maker_name',
        'set_goods_first_time_sold_date',
        'set_goods_last_time_sold_date',
        'set_goods_creation_date',
        'set_goods_creator_id',
        'set_goods_creator_name',
        'set_goods_last_modified_date',
        'set_goods_last_modified_by_id',
        'set_goods_last_modified_by_name',
    ];
}
