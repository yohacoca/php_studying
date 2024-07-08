<?php
declare(strict_types=1);

namespace design\structural\Proxy;

interface Subject
{
    function request(): void;
}