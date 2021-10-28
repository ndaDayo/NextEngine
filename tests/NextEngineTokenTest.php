<?php

declare(strict_types=1);

namespace NdaDayo\NextEngine;

use GuzzleHttp\ClientInterface;
use Mockery;
use NdaDayo\NextEngine\ValueObjects\Token;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class NextEngineTokenTest extends TestCase
{
    protected PsrResponseInterface $response;
    protected string $clientId;
    protected string $clientSecret;
    private string $redirectUri;

    protected function setUp(): void
    {
        $this->response = Mockery::mock(PsrResponseInterface::class);
        $this->response->shouldReceive('getBody')->andReturn($this->expectedAccessTokenResponse());
        $this->clientId = 'client_id';
        $this->clientSecret = 'client_secret';
        $this->redirectUri = 'redirect_uri';
    }

    public function testRedirect(): void
    {
        $client = Mockery::mock(ClientInterface::class);
        $nextEngineToken = new NextEngineToken($client, $this->clientId, $this->clientSecret, $this->redirectUri);
        $expected = 'https://base.next-engine.org/users/sign_in?client_id=client_id&redirect_uri=redirect_uri';
        $this->assertSame($expected, $nextEngineToken->redirect());
    }

    public function testCallBack(): void
    {
        $uid = 'uid';
        $state = 'state';
        $expectedUrl = 'https://api.next-engine.org/api_neauth';
        $expectedRequestOptions = [
            'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'uid' => $uid,
                'state' => $state,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
            ],
        ];

        $client = Mockery::mock(ClientInterface::class);
        $client->shouldReceive('request')
            ->andReturnUsing(function (string $method, string $uri, array $requestOptions) use ($expectedUrl, $expectedRequestOptions) {
                $this->assertSame('POST', $method);
                $this->assertSame($expectedUrl, $uri);
                $this->assertEquals($expectedRequestOptions['headers']['Content-Type'], $requestOptions['headers']['Content-Type']);
                $this->assertEquals($expectedRequestOptions['form_params']['uid'], $requestOptions['form_params']['uid']);
                $this->assertEquals($expectedRequestOptions['form_params']['state'], $requestOptions['form_params']['state']);
                $this->assertEquals($expectedRequestOptions['form_params']['client_id'], $requestOptions['form_params']['client_id']);
                $this->assertEquals($expectedRequestOptions['form_params']['client_secret'], $requestOptions['form_params']['client_secret']);

                return $this->response;
            });

        $nextEngineToken = new NextEngineToken($client, $this->clientId, $this->clientSecret, $this->redirectUri);
        $result = $nextEngineToken->callback($uid, $state);
        $this->assertInstanceOf(Token::class, $result);
        $this->assertSame('access_token_dummy_data', $result->getAccessToken());
        $this->assertSame('refresh_token_dummy_data', $result->getRefreshToken());
    }

    private function expectedAccessTokenResponse(): string
    {
        return '{"access_token":"access_token_dummy_data",
        "company_app_header":"company_app_header",
        "company_ne_id":"company_ne_id",
        "company_name":"company_name",
        "company_kana":"company_kana",
        "uid":"uid",
        "pic_ne_id":"pic_ne_id",
        "pic_name":"pic_name",
        "pic_kana":"pic_kana",
        "pic_mail_address":"pic_mail_address",
        "refresh_token":"refresh_token_dummy_data",
        "result":"success"}';
    }
}
