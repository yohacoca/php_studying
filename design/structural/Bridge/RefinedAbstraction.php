<?php
declare(strict_types=1);

namespace design\structural\Bridge;

class RefinedAbstraction extends Abstraction
{
    public function feature(): void
    {
        $this->i->method();
    }
}
