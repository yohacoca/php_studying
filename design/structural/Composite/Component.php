<?php
declare(strict_types=1);

namespace design\structural\Composite;

interface Component
{
    public function operation(): void;
}