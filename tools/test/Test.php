<?php
declare(strict_types=1);

namespace tools\test;

class Test
{
    private string $name;
    public function __construct()
    {
    }

    public function init(string $name): void
    {
        $this->name = $name;
    }

    private function save(): void
    {
        echo "保存: " . $this->name;
    }


}