<?php
declare(strict_types=1);

namespace Structural\Adapter;

interface Target
{
    public function request(): void;
}