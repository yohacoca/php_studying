<?php
declare(strict_types=1);

namespace Structural\Proxy;

interface Subject
{
    function request(): void;
}