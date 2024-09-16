<?php
declare(strict_types=1);

namespace tools\package\request;

use Exception;
use PHPUnit\Framework\TestCase;

class Curl extends TestCase
{


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
            var_dump($this->get($url, $request_data));
        } catch (Exception $e) {
            echo "请求失败";
            echo $e->getMessage();
        }


        $this->assertTrue(true);
    }

    /**
     * @throws Exception
     */
    public function get($url, $params = []): array
    {
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);

    }


    public function test_post_form($data = [])
    {
        $url = 'https://example.com/api';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // 将参数转换为查询字符串
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response);
    }


}