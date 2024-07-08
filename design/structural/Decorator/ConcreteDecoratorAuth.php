<?php
declare(strict_types=1);

namespace design\structural\Decorator;

class ConcreteDecoratorAuth extends Decorator
{
    public function __construct(Component $component)
    {
        parent::__construct($component);
    }

    public function request(): void
    {
        echo "add Auth".PHP_EOL;
        parent::request();
    }
}