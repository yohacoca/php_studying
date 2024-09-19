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

    /**
     * @throws Exception
     */
    public function post_form_data($url, $params = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);
    }

    /**
     * @throws Exception
     */
    public function post_form_xxx_w($url, $params = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);
    }

    /**
     * @throws Exception
     */
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

        if (curl_errno($ch)) {
            // 抛出异常
            throw new Exception('Curl error: ' . curl_error($ch));
        }

        return json_decode($response, true);
    }


}