<?php

namespace Structural\Composite;

class Leaf implements Component
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function operation(): void
    {
        echo "name: ".$this->name.PHP_EOL;
    }
}