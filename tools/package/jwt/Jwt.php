<?php
declare(strict_types=1);

namespace tools\package\jwt;

use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;
use PHPUnit\Framework\TestCase;
use stdClass;


// 安装 composer require firebase/php-jwt

class Jwt extends TestCase
{
    public static string $key = 'KEY-TEST';
    public static string $alg = 'HS256';
    // (Not Before): 某个时间点后才能访问, 比如设置time+30, 表示当前时间30秒后才能使用
    public static int $nbf = 0;
    // 过期时间,这里设置2个小时
    public static int $exp = 7200;

    // encode 加密jwt
    public static function encode($data): string
    {

        $time = time();
        $token = [
            'iss' => 'issued',            // 签发者 可选
            'aud' => 'receive',           // 接收者
            'iat' => $time,               // 签发时间
            'nbf' => $time + self::$nbf,
            'exp' => $time + self::$exp,
            'data' => $data
        ];
        return FirebaseJWT::encode($token, self::$key, self::$alg);
    }

    // decode 解密jwt
    public static function decode(string $token): stdClass
    {
        return FirebaseJWT::decode($token, new Key(self::$key, self::$alg));
    }

    public function test()
    {
        $data = array('user' => 'admin', 'msg' => 'test');
        $jwt = $this->encode($data);
        $decode = (array)$this->decode($jwt)->data;
        $this->assertTrue($decode == $data);
    }
}