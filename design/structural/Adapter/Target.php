<?php
declare(strict_types=1);

namespace design\structural\Adapter;

interface Target
{
    public function request(): void;
}