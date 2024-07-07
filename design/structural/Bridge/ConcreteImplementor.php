<?php
declare(strict_types=1);

namespace design\structural\Bridge;

class ConcreteImplementor implements Implementor
{
    public function method(): void
    {
        echo "ConcreteImplementor method";
    }
}