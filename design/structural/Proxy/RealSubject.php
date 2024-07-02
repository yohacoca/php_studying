<?php
declare(strict_types=1);

namespace Structural\Proxy;

class RealSubject implements Subject
{
    function request(): void
    {
        echo "real request".PHP_EOL;
    }
}