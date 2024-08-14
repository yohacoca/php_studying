<?php
declare(strict_types=1);

namespace tools\package\jwt;

use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;
use PHPUnit\Framework\TestCase;
use stdClass;

// 安装 composer require firebase/php-jwt
// 使用 需要传递的用户信息使用encode加密生成token, 使用decode方法进行解密获取用户信息

// key 服务器key
// alg 签名算法
// 非对称RS512 使用公钥和私钥

class RsJwt extends TestCase
{
    public static string $alg = 'RS512';
    // (Not Before): 某个时间点后才能访问, 比如设置time+30, 表示当前时间30秒后才能使用
    public static int $nbf = 0;
    // 过期时间,这里设置2个小时
    public static int $exp = 7200;

    // 公钥
    public static string $public_key = <<<EOD
    -----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAk98ytzwTZpLTWpSgX/8I
    UalVtEcoAz6PZGbbaePC+3D5wDqQZx0AmpbZv/A3+fsEVWbkk1WJKZc3IrnbH9jh
    /KjWcsrBDpmzYIk5IuxgnN1CKRwx7RUEFP+SOnZoQfMalZgNA30nPzS3cYseW5ix
    oT4MjJZ4H6na621pP09NYpRNA/zovYr2dRIPKoePTNEUzZr2WxccLSyEWjoQudtA
    iecxexcg1PcsStpFrWrV7N02O/9PtVF0m2eyskDs22kgahY9h0Ifc48MSBfenYga
    nk0AWYhnMgkkS8SdfKdM+KOIGtz40CvysNNoO9B9g2qTdbQBwSv8wLpqAvWS/0TH
    5wIDAQAB
    -----END PUBLIC KEY-----
    EOD;

    // 私钥
    public static string $private_key = <<<EOD
    -----BEGIN PRIVATE KEY-----
    MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCT3zK3PBNmktNa
    lKBf/whRqVW0RygDPo9kZttp48L7cPnAOpBnHQCaltm/8Df5+wRVZuSTVYkplzci
    udsf2OH8qNZyysEOmbNgiTki7GCc3UIpHDHtFQQU/5I6dmhB8xqVmA0DfSc/NLdx
    ix5bmLGhPgyMlngfqdrrbWk/T01ilE0D/Oi9ivZ1Eg8qh49M0RTNmvZbFxwtLIRa
    OhC520CJ5zF7FyDU9yxK2kWtatXs3TY7/0+1UXSbZ7KyQOzbaSBqFj2HQh9zjwxI
    F96diBqeTQBZiGcyCSRLxJ18p0z4o4ga3PjQK/Kw02g70H2DapN1tAHBK/zAumoC
    9ZL/RMfnAgMBAAECggEAEdxn19Id1cnuVYaWSIIZkyONApWFs76eu1XhMs0cBBsF
    T77DKnFKXWHTM2fkmwFC6L3g5hry0l89fahNW29q/IW4QW1UHFtcW1C34gwDL29a
    SnTpYuWi9JZaJ02eEjk3ANK4368CSpQnhEN1i0LKUduY0HJsWAbANqekis0dX8ay
    9Z+l1UJdDO423fX7Srfyu2tAgrwTbvNjnFEMDb5LcogillVYsFYwbOjb4fG9HY3j
    EpFm7wBMwfhmCCwa5UJH0sth/oyE4uek+Ml+4Oeg+86LJo9RBX44u8Cu+B/ao65e
    xH5ih71lTQhJQaEoxwYSnVyDMNEzWD+ldBZFUOK54QKBgQDEduZYb+h1nahjpwjA
    yFOP1cdarxGGZJ5/XaQuDsmQO+azqXOusb/AB+1/yJERRGvPzGXbQeujpxMxnpx5
    nHPIVY9jNkKDPI9uFWDMXj2Ww+IPdqyvhn5j4wz7IxuzQF+58ID3ZGVUL7PaA9ok
    BvpALLZSNCjkyQVNbmRQhFk7+wKBgQDArqMQd8yZcT5XbNSH3YNsR/bs2D5NogtI
    6MW8atTaD4kOv+skVrzEQRKFH8kcg93pVO+wM4T/1opRMhoRJfRGMah13zYWmzvn
    JGfqMqmIRQY0YCBrlMym/bE1JTF6TP6E/EVFItH4EjY/ot0L/pxBEFw6kWXJ6u8C
    VEkIS9UUBQKBgQChE2rf70CDzfMVYQmIJbZ9IyUDcK3Jpg1dF4VYTb9shfAsNS4n
    eIxiAR3zuplVsudBw69vCKkN0BmogQaBnog/JAcfrIjz2F8wPk7SwCF2zrs1OnNy
    pa5SbwFhlfNMD+dsJ4dVTfbWAxZOFQJwr1fV7dK9qw4sJbQ3O977NMeEqQKBgCzW
    twW3CzrN+pb3sYGoj9Pb719wdxcz1XJzEMjnB39zTA7NpJfBQ45cIkYufmuPWE3b
    QSf85T9wGqIIib5h2bWYCr7bYcfi+g6xDymV/pPClE4N7J18dB+MO/fFHv15+2TR
    HAGZt8kF2+/1I4GOD6ioeP38JfbWICannJM8qmpNAoGASuD6KQ9/7DL8cVfBT3Iq
    pgS/g5+nSOjpVcuIjqbTa4rUhS7cmxpfyVTD0pc7pT97Uo/8aIzV5RoIW7sm6l1K
    KJV2ledVNSJw1ZBtKP2SS4/YHdFme22X86aPqzbs5x56ECZiYZtJeFw06gERowG2
    sbzv17YRUolWWHx9mMwJnrg=
    -----END PRIVATE KEY-----
    EOD;

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
        return FirebaseJWT::encode($token, self::$private_key, self::$alg);
    }

    // decode 解密jwt
    public static function decode(string $token): stdClass
    {
        return FirebaseJWT::decode($token, new Key(self::$public_key, self::$alg));
    }

    public function test():void
    {
        $data = array('user' => 'admin', 'msg' => 'test');
        $jwt = $this->encode($data);
        $decode = (array)$this->decode($jwt)->data;
        var_dump($decode);
        $this->assertTrue(true);
    }
}