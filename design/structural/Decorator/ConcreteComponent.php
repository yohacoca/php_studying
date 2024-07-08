<?php
declare(strict_types=1);

namespace design\structural\Decorator;

class ConcreteComponent implements Component
{
    public function request(): void
    {
        echo "发送请求".PHP_EOL;
    }
}