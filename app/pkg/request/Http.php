<?php
namespace app\pkg\request;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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


    public function get(): array
    {
        $data = [
            'code' => 400,
            'msg' => '',
            'data' => []
        ];
        try {
            $client = new Client();
            $response = $client->get($this->url . $this->path,[
                "header" => $this->header,
                'query' => $this->query,
            ]);
            // 服务器500 抛出异常
            if (200 !== $response->getStatusCode()){
                throw new Exception("server return err; " . $response->getStatusCode());
            }
            $responseData = $response->getBody()->getContents();
            $data['code'] = 200;
            $data['data'] = json_decode($responseData, true, JSON_UNESCAPED_UNICODE);
        }catch (RequestException|Exception $exception){
            $data['msg'] = $exception->getMessage();
        }finally{
            return $data;
        }
    }

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

}