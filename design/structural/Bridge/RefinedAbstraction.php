<?php

namespace Structural\Bridge;

class RefinedAbstraction extends Abstraction
{
    public function feature(): void
    {
        $this->i->method();
    }
}
