<?php
declare(strict_types=1);

namespace design\structural\Facade;

class SubSystem1
{
    public function request(): void
    {
        echo "subSystem1 request".PHP_EOL;
    }
}