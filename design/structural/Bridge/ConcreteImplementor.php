<?php
namespace Structural\Bridge;

class ConcreteImplementor implements Implementor
{
    public function method(): void
    {
        echo "ConcreteImplementor method";
    }
}