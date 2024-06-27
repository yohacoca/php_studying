<?php
declare(strict_types=1);

namespace Structural\Adapter;

class ObjectAdapter implements Target
{

    private Adaptee $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function request(): void
    {
        $this->adaptee->specialRequest();
    }
}