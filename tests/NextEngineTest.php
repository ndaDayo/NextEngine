<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine;

use GuzzleHttp\ClientInterface;
use Mockery;
use NdaDayo\NextEngine\Condition\Fields\FieldsInterface;
use NdaDayo\NextEngine\Contracts\ConditionInterface;
use NdaDayo\NextEngine\Contracts\ResponseInterface;
use NdaDayo\NextEngine\Exception\ClientException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class NextEngineTest extends TestCase
{
    protected PsrResponseInterface $response;
    protected FieldsInterface $feilds;
    protected ConditionInterface $condition;

    protected function setUp(): void
    {
        $this->response = Mockery::mock(PsrResponseInterface::class);
        $this->response->shouldReceive('getBody')->andReturn($this->expected());
        $this->feilds = Mockery::mock(FieldsInterface::class);
        $this->condition = Mockery::mock(ConditionInterface::class);

        $this->feilds->shouldReceive('payload')->andReturn('goods_id,goods_name');
        $this->condition->shouldReceive('method')->andReturn('POST');
        $this->condition->shouldReceive('payload')->andReturn(['fields' => 'goods_id,goods_name']);
        $this->condition->shouldReceive('__toString')->andReturn('/api_v1_master_goods/search');
    }

    public function testInvokeHasRefreshToken(): void
    {
        $accessToken = 'access_token';
        $refreshToken = 'refresh_token';
        $expectedUrl = $this->expectedUrl();
        $expectedRequestOptions = $this->expectedRequestOptions();

        $client = Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->andReturnUsing(function (string $method, string $uri, array $requestOptions) use ($expectedUrl, $expectedRequestOptions) {
                $this->assertSame('POST', $method);
                $this->assertSame($expectedUrl, $uri);
                $this->assertEquals($expectedRequestOptions['headers']['Content-Type'], $requestOptions['headers']['Content-Type']);
                $this->assertEquals($expectedRequestOptions['form_params']['access_token'], $requestOptions['form_params']['access_token']);
                $this->assertEquals($expectedRequestOptions['form_params']['fields'], $requestOptions['form_params']['fields']);
                $this->assertEquals($expectedRequestOptions['form_params']['refresh_token'], $requestOptions['form_params']['refresh_token']);

                return $this->response;
            });

        $response = (new NextEngine($client))($this->condition, $accessToken, $refreshToken);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals($this->expected(), $response->body());
    }

    public function testInvokeNoneRefreshToken(): void
    {
        $accessToken = 'access_token';
        $refreshToken = null;
        $expectedUrl = $this->expectedUrl();
        $expectedRequestOptions = $this->expectedRequestOptions();

        $client = Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->andReturnUsing(function (string $method, string $uri, array $requestOptions) use ($expectedUrl, $expectedRequestOptions) {
                $this->assertSame('POST', $method);
                $this->assertSame($expectedUrl, $uri);
                $this->assertEquals($expectedRequestOptions['headers']['Content-Type'], $requestOptions['headers']['Content-Type']);
                $this->assertEquals($expectedRequestOptions['form_params']['access_token'], $requestOptions['form_params']['access_token']);
                $this->assertEquals($expectedRequestOptions['form_params']['fields'], $requestOptions['form_params']['fields']);
                $this->assertArrayNotHasKey('refresh_token', $requestOptions['form_params']);

                return $this->response;
            });

        $response = (new NextEngine($client))($this->condition, $accessToken, $refreshToken);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame($this->expected(), $response->body());
    }

    public function testInvokeException(): void
    {
        $accessToken = 'access_token';
        $refreshToken = 'refresh_token';

        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('');

        $client = Mockery::mock(ClientInterface::class);

        $client->shouldReceive('request')->andThrow('Exception');

        (new NextEngine($client))($this->condition, $accessToken, $refreshToken);
    }

    private function expectedUrl(): string
    {
        return 'https://api.next-engine.org/api_v1_master_goods/search';
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function expectedRequestOptions(): array
    {
        return [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'access_token' => 'access_token',
                'fields' => 'goods_id,goods_name',
                'refresh_token' => 'refresh_token',
            ],
        ];
    }

    private function expected(): string
    {
        return '{"result": "success",
           "count": "1",
           "data": [{"goods_id": "TestP001","goods_name": "登録時必須"}],
           "access_token": "access_token",
           "access_token_end_date": "2017-04-15 13:03:47",
           "refresh_token": "refresh_token",
           "refresh_token_end_date": "2017-04-17 13:03:47"}';
    }
}
