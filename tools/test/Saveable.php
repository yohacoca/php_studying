<?php
declare(strict_types=1);

namespace tools\test;

interface Saveable
{
    public function save(): void;
}