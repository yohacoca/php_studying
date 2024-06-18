<?php
namespace app\pkg\request;

use GuzzleHttp\Client;

class Http
{
    // 地址
    public string $url;
    // 路径
    public string $path;
    // 请求头
    public array $header;
    // query参数
    public array $query;
    // 参数
    public array $param;

    public static function url(string $url): Http
    {
        $http = new Http();
        // 初始化请求参数
        $http->url = $url;
        $http->header = [];
        $http->query = [];
        $http->param = [];
        return $http;
    }
    public function path(string $path): Http
    {
        $this->path = $path;
        return $this;
    }
    public function get(): array
    {
        $client = new Client();
        $response = $client->get($this->url . $this->path,[
            "header" => $this->header,
            'query' => $this->query,
        ]);
        $body = $response->getBody();
        return json_decode($body->getContents(), true, 512, JSON_UNESCAPED_UNICODE);
    }

}