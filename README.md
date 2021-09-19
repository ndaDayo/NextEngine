# NextEngine Api Client

[![Packagist](https://img.shields.io/badge/packagist-v1.0-blue.svg)](https://packagist.org/packages/ndaDayo/nextengine)
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

$nextEngineToken = new NextEngineToken($client, $clientId, $clientSecret);
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

#### 商品マスタを取得

```
$fields = [
    'goods_id',
    'goods_representation_id',
    'goods_name',
];

$fields = new MasterGoodsFields($field);
$masterGoods = new MasterGoods();
$masterGoods->fields($fields);

$response = $nextEngine($MasterGoods);
$response->body();
```

#### 受注伝票を取得

```
$field = [
    'receive_order_shop_id',
    'receive_order_id',
    'receive_order_shop_cut_form_id',
];

$fields = new ReceiveOrderBaseFields($field);
$receiveOrderBase = new ReceiveOrderBase();
$receiveOrderBase->fields($fields);
$response = $nextEngine($receiveOrderBase)
$response->body();
```

#### 受注明細を取得

```
$field = [
    'receive_order_row_receive_order_id',
    'receive_order_row_shop_cut_form_id',
    'receive_order_row_no',
];

$fields = new ReceiveOrderRowFields($field);
$receiveOrderRow = new ReceiveOrderRow();
$receiveOrderRow->fields($fields);

$response = $nextEngine($receiveOrderRow);
$response->body();
```

## Test

```
$ composer test
```
