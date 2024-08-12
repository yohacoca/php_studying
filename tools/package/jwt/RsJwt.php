<?php
declare(strict_types=1);

namespace tools\package\jwt;

use Firebase\JWT\JWT as FirebaseJWT;
use Firebase\JWT\Key;
use PHPUnit\Framework\TestCase;
use stdClass;


class RsJwt extends TestCase
{

    // encode 加密jwt
    public static function encode($data): string
    {

    }

    // decode 解密jwt
    public static function decode(string $token): stdClass
    {
    }

    public function test()
    {
    }
}