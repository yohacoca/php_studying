<?php
declare(strict_types=1);

namespace design\structural\Composite;

class Composite implements Component
{
    private string $name;
    /** @var Component[] $leafs */
    private array $leafs;

    public function __construct(string $name){
        $this->name = $name;
    }

    public function add(Component $c): void
    {
        $this->leafs[] = $c;
    }

    public function remove(Component $c): void
    {
        $this->leafs = array_diff($this->leafs, [$c]);
    }


    public function getChild(): array
    {
        return $this->leafs;
    }

    public function operation(): void
    {
        echo "composite: ".$this->name.PHP_EOL;
        foreach ($this->leafs as $leaf){
            $leaf->operation();
        }
    }
}