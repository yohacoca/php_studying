<?php

namespace Structural\Decorator;

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