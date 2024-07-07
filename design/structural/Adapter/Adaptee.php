<?php
declare(strict_types=1);

namespace design\structural\Adapter;

class Adaptee
{
    public function specialRequest(): void
    {
        echo "adaptee specialRequest".PHP_EOL;
    }
}