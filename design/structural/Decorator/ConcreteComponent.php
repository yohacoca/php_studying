<?php

namespace Structural\Decorator;

class ConcreteComponent implements Component
{
    public function request(): void
    {
        echo "发送请求".PHP_EOL;
    }
}