<?php
declare(strict_types=1);

namespace tools\test;

class Test implements Saveable
{
    private string $name;
    public function __construct()
    {
    }

    public function init(string $name): void
    {
        $this->name = $name;
    }

    public function save(): void
    {
        echo "保存: " . $this->name;
    }


}