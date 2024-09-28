<?php
declare(strict_types=1);

namespace tools\package\request;

use CURLFile;
use Exception;
use PHPUnit\Framework\TestCase;

class Curl extends TestCase
{

//    CURLOPT_URL                   设置请求的 URL
//    CURLOPT_RETURNTRANSFER        将响应结果以字符串返回，而不是直接输出
//    CURLOPT_POST                  指定请求为 POST 方法
//    CURLOPT_POSTFIELDS            设置要发送的数据（POST 请求）
//    CURLOPT_HTTPHEADER            设置 HTTP 请求头
//    CURLOPT_TIMEOUT               设置请求超时时间（单位：秒）
//    CURLOPT_FOLLOWLOCATION        启用时，cURL 会自动跟随服务器的 Location 重定向
//    CURLOPT_SSL_VERIFYPEER        设置是否验证 SSL 证书（对于 HTTPS 请求）。建议在生产环境中保持为 true
//    CURLOPT_USERAGENT             设置用户代理（User-Agent）字符串
//    CURLOPT_WRITEFUNCTION         自定义数据写入函数，可以用于处理大数据流


    public static array $data = [
        'user' => 'root',
        'data' => 'success',
    ];

    public function test_get()
    {
        $url = 'http://47.94.153.175:8080/api/get';
        $request_data = [
            'id' => '1',
            'name' => '张三',
            'age' => '23',
        ];

        try {
            print_r($this->get($url, $request_data));
        } catch (Exception $e) {
            echo "请求失败";
            echo $e->getMessage();
        }


        $this->assertTrue(true);
    }


    public function test_post()
    {
        $request_data = [
            'id' => '1',
            'name' => '张三',
            'age' => '23',
        ];

        try {
//
//            $url = 'http://localhost:8080/api/post_form_data';
//            print_r($this->post_form_data($url, $request_data));

//            $url = 'http://localhost:8080/api/post_x_www_form';
//            print_r($this->post_form_xxx_w($url, $request_data));

            $url = 'http://localhost:8080/api/post_raw';
            print_r($this->post_form_raw($url, $request_data));

        } catch (Exception $e) {
            echo "请求失败";
            echo $e->getMessage();
        }

        $this->assertTrue(true);
    }

    // get 普通get请求
    public function get($url, $params = []): array
    {
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);

    }

    // post_form_data post请求 携带form-data参数
    public function post_form_data($url, $params = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);
    }

    // post_form_xxx_w post请求 携带x-www-form-urlencoded参数
    // 使用 http_build_query() 处理请求数据就为x-www-form-urlencoded参数
    public function post_form_xxx_w($url, $params = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        curl_close($ch);
        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);
    }

    // post_form_raw post请求 携带原始参数
    public function post_form_raw($url, $params = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen(json_encode($params))
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);
    }

    // post_form_raw post请求 携带原始参数
    public function post_file($url, $params = [])
    {

        $filePath = 'file.txt';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://example.com/upload');
        curl_setopt($ch, CURLOPT_POST, true);

        $cfile = new CURLFile($filePath);
        $postData = array('file' => $cfile);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }


        return json_decode($response, true);
    }

}