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
    // 参数
    public array $param;

    public static function url(string $url): Http
    {
        $http = new Http();
        $http->url = $url;
        return $http;
    }

    public function path(string $path): Http
    {
        $this->path = $path;
        return $this;
    }

}