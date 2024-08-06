<?php
declare(strict_types=1);

namespace tools\jwt;

use PHPUnit\Framework\TestCase;
use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;
use \stdClass;


// 安装 composer require firebase/php-jwt

class Jwt extends TestCase
{
    public static string $key = 'KEY-TEST';

    public static function encode(): string
    {

        $time = time();
        $token = [
            'iss' => 'issued',      //签发者 可选
            'aud' => 'receive',     //接收者
            'iat' => $time,         //签发时间
            'nbf' => $time ,        //(Not Before): 某个时间点后才能访问, 比如设置time+30, 表示当前时间30秒后才能使用
            'exp' => $time + 7200,  //过期时间,这里设置2个小时
            'data' => [             //自定义信息，不要定义敏感信息
                'userid' => 1,
                'username' => 'John'
            ]
        ];
        return FirebaseJWT::encode($token, self::$key, 'HS256'); //输出Token
    }

    public static function decode(string $key): stdClass
    {

        return FirebaseJWT::decode($key, new Key(self::$key, 'HS256'),);
    }

    public function test()
    {
        $jwt = $this->encode();
        var_dump((array)$this->decode($jwt));
        $this->assertTrue(true);
    }
}