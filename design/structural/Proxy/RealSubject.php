<?php
declare(strict_types=1);

namespace design\structural\Proxy;

class RealSubject implements Subject
{
    function request(): void
    {
        echo "real request".PHP_EOL;
    }
}