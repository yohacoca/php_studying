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

    /**
     * @throws Exception
     */
    public function test_get($data = [])
    {
        $url = 'https://example.com/api';

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

        return json_decode($response);
    }


    public function test_post($data = [])
    {
        $url = 'https://example.com/api';

        $data = [
            'param1' => 'value1',
            'param2' => 'value2'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            echo "Response from server: " . $response;
        }

        curl_close($ch);
    }



}