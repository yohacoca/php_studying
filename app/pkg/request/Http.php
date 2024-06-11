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
        $http->url = $url;
        return $http;
    }

    public function path(string $path): Http
    {
        $this->path = $path;
        return $this;
    }

    public function header(array $header): Http
    {
        $this->header = $header;
        return $this;
    }

    public function query(array $param): Http
    {
        $this->query = $param;
        return $this;
    }


    public function param(array $param): Http
    {
        $this->param = $param;
        return $this;
    }

    public function get()
    {

    }

    public function post()
    {

    }

}