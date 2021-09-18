<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine\Condition\Fields;

final class ReceiveOrderRowFields extends AbstractFields
{
    /** @var array<int, string> $validFields */
    protected static array $validFields = [
        'receive_order_row_receive_order_id',
        'receive_order_row_shop_cut_form_id',
        'receive_order_row_no',
        'receive_order_row_shop_row_no',
        'receive_order_row_goods_id',
        'receive_order_row_goods_name',
        'receive_order_row_quantity',
        'receive_order_row_unit_price',
        'receive_order_row_received_time_first_cost',
        'receive_order_row_tax_rate',
        'receive_order_row_wholesale_retail_ratio',
        'receive_order_row_sub_total_price',
        'receive_order_row_goods_option',
        'receive_order_row_cancel_flag',
        'receive_order_include_from_order_id',
        'receive_order_include_from_row_no',
        'receive_order_row_multi_delivery_parent_order_id',
        'receive_order_row_divide_from_row_no',
        'receive_order_row_copy_from_row_no',
        'receive_order_row_stock_allocation_quantity',
        'receive_order_row_advance_order_stock_allocation_quantity',
        'receive_order_row_stock_allocation_date',
        'receive_order_row_received_time_merchandise_id',
        'receive_order_row_received_time_merchandise_name',
        'receive_order_row_received_time_goods_type_id',
        'receive_order_row_received_time_goods_type_name',
        'receive_order_row_returned_good_quantity',
        'receive_order_row_returned_bad_quantity',
        'receive_order_row_returned_reason_id',
        'receive_order_row_returned_reason_name',
        'receive_order_row_org_row_no',
        'receive_order_row_deleted_flag',
        'receive_order_row_creation_date',
        'receive_order_row_last_modified_date',
        'receive_order_row_last_modified_null_safe_date',
        'receive_order_row_last_modified_newest_date',
        'receive_order_row_creator_id',
        'receive_order_row_creator_name',
        'receive_order_row_last_modified_by_id',
        'receive_order_row_last_modified_by_null_safe_id',
        'receive_order_row_last_modified_by_name',
        'receive_order_row_last_modified_by_null_safe_name',
    ];
}
