<?php
declare(strict_types=1);

namespace design\structural\Bridge;
abstract class Abstraction
{
    protected Implementor $i;

    public function set(Implementor $i): void
    {
        $this->i = $i;
    }

    abstract public function feature(): void;
}