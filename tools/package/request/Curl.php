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

    public function test_get($data = [])
    {
        $url = 'https://example.com/api'; // 替换为目标 URL

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
}