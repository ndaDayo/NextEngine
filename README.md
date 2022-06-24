# NextEngine Api Client

[![Packagist](https://img.shields.io/badge/packagist-v2.5.1-blue.svg)](https://packagist.org/packages/ndaDayo/nextengine)
[![CI](https://github.com/ndaDayo/nextengine/actions/workflows/ci.yml/badge.svg)](https://github.com/ndaDayo/nextengine/actions/workflows/ci.yml)

NextEngineのAPIを利用するためのライブラリです。

## Installation

```
$ composer require ndadayo/nextengine
```

## Usage

### AccessToken,RefreshToken

```
<?php
// initialize
use GuzzleHttp\Client;
use NdaDayo\NextEngine\NextEngineToken;

$client = new Client();
$clientId = 'client-id';
$clientSecret = 'client-secret';
$redirectUri = 'redirect_uri'

$nextEngineToken = new NextEngineToken($client, $clientId, $clientSecret, $redirectUri);
```

#### 認証画面のURLを取得

```
$nextEngineToken->redirect();
```

#### AccessToken,RefreshTokenを取得

```
$uid = 'nextengine-uid';
$state = 'nextengine-state';

$token = $nextEngineToken->callback($uid, $state);

// AccessToken
$token->getAccessToken();

// RefreshToken
$token->getRefreshToken();
```

### Resource

```
<?php
// initialize
use GuzzleHttp\Client;
use NdaDayo\NextEngine\NextEngine;

$client = new Client();
$accessToken = 'access-token';

$nextEngine = new NextEngine($client, $accessToken);
```

#### 商品マスタ

```
$field = [
    'goods_id',
    'goods_representation_id',
    'goods_name',
];

$criteria = [
    [
        'field' => 'goods_id',
        'operator' => '-eq',
        'parameter' => 'goods_idを設定',
    ],
];

$fields = new MasterGoodsFields($field);
$criteria = new MasterGoodsCriteria($criteria);
$masterGoods = new MasterGoods();
$masterGoods->fields($fields)->criteria($criteria);

$response = $nextEngine($masterGoods, 'access_token');
$response->body();
```

#### 受注伝票

```
$field = [
    'receive_order_shop_id',
    'receive_order_id',
    'receive_order_shop_cut_form_id',
];

$criteria = [
    [
        'field' => 'receive_order_id',
        'operator' => '-eq',
        'parameter' => 'receive_order_idを設定',
    ],
];

$fields = new ReceiveOrderBaseFields($field);
$criteria = new ReceiveOrderBaseCriteria($criteria);
$receiveOrderBase = new ReceiveOrderBase();
$receiveOrderBase->fields($fields)->criteria($criteria);
$response = $nextEngine($receiveOrderBase, 'access_token');
$response->body();
```

#### 受注明細

```
$field = [
    'receive_order_row_receive_order_id',
    'receive_order_row_shop_cut_form_id',
    'receive_order_row_no',
];

$criteria = [
    [
        'field' => 'receive_order_id',
        'operator' => '-eq',
        'parameter' => 'receive_order_idを設定',
    ],
];

$fields = new ReceiveOrderRowFields($field);
$criteria = new ReceiveOrderRowCriteria($criteria);
$receiveOrderRow = new ReceiveOrderRow();
$receiveOrderRow->fields($fields)->criteria($criteria);
$response = $nextEngine($receiveOrderRow, 'access_token');
$response->body();
```

#### 商品ページ

```
$field = [
    'goods_page_goods_code',
    'goods_page_goods_name',
    'goods_page_display_flag',
];

$criteria = [
    [
        'field' => 'goods_page_goods_code',
        'operator' => '-eq',
        'parameter' => 'goods_page_goods_codeを設定',
    ],
];

$fields = new MasterGoodsPageFields($field);
$criteria = new MasterGoodsPageCriteria($criteria);
$masterGoodsPage = new MasterGoodsPage();
$masterGoodsPage->fields($fields)->criteria($criteria);
$response = $nextEngine($masterGoodsPage, 'access_token');
$response->body();
```

#### 商品ページ(バリエーション)

```
$field = [
    'goods_page_goods_code',
    'goods_page_v_horizontal_name',
    'goods_page_v_horizontal_value',
];

$criteria = [
    [
        'field' => 'goods_page_goods_code',
        'operator' => '-eq',
        'parameter' => 'goods_page_goods_codeを設定',
    ],
];

$fields = new MasterGoodsPageVariationFields($field);
$criteria = new MasterGoodsPageVariationCriteria($criteria);
$masterGoodsPageVariation = new MasterGoodsPageVariation();
$masterGoodsPageVariation->fields($fields)->criteria($criteria);
$response = $nextEngine($masterGoodsPageVariation, 'access_token');
$response->body();
```

#### 店舗マスタ

```
$field = [
    'shop_id',
    'shop_name',
];

$fields = new MasterShopFields($field);
$masterShop = new MasterShop();
$masterShop->fields($fields);

$response = $nextEngine($masterShop, 'access_token');
$response->body();
```

#### 受注伝票出荷確定処理

```
$receiveOrderBaseShipped = new ReceiveOrderBaseShipped();
$receiveOrderBaseShipped->receiveOrderId('order_idを設定');
$receiveOrderBaseShipped->receiveOrderLastModifiedDate('last_modified_dateを設定');

$response = $nextEngine($receiveOrderBaseShipped, 'access_token');
$response->body();
```

#### 受注伝票更新

```
$receiveOrderBaseUpdate = new ReceiveOrderBaseUpdate();
$receiveOrderBaseUpdate->receiveOrderId('order_idを設定');
$receiveOrderBaseUpdate->receiveOrderLastModifiedDate('last_modified_dateを設定');

$xmlstr = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<root>
<receiveorder_base>
<receive_order_delivery_cut_form_id>伝票番号</receive_order_delivery_cut_form_id>
</receiveorder_base>
</root>
XML;

$receiveOrderBaseUpdate->data($xmlstr);

$response = $nextEngine($receiveOrderBaseUpdate, 'access_token');
$response->body();
```

## Test

```
$ composer test
```
