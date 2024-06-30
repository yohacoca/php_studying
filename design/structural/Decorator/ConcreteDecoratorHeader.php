<?php

namespace Structural\Decorator;

class ConcreteDecoratorHeader extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function request(): void
    {
        echo "add header".PHP_EOL;
        parent::request();
    }
}