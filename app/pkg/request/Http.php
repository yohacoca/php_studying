<?php
namespace app\pkg\request;
use GuzzleHttp\Client;

class Http
{
    // 保存一些请求参数
    public array $requestParam;

    public static function url($url): Http
    {
        $http = new Http();
        $http->requestParam['url'] = $url;
        return $http;
    }

    public function send(): array
    {
        $client = new Client();
        $data = $client->request('');
        return json_decode($data);
    }

}