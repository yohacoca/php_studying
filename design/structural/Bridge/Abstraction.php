<?php

namespace Structural\Bridge;
abstract class Abstraction
{
    protected Implementor $i;

    public function set(Implementor $i): void
    {
        $this->i = $i;
    }

    abstract public function feature(): void;
}