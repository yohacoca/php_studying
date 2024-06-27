<?php
declare(strict_types=1);

namespace Structural\Adapter;

class Adaptee
{
    public function specialRequest(): void
    {
        echo "adaptee specialRequest".PHP_EOL;
    }
}