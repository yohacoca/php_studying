<?php
declare(strict_types=1);

namespace design\structural\Decorator;

abstract class Decorator implements Component
{
    protected Component $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    public function request(): void
    {
        $this->component->request();
    }
}