<?php
declare(strict_types=1);

namespace design\structural\Decorator;

interface Component
{
    public function request(): void;
}