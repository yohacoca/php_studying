<?php
declare(strict_types=1);

namespace design\structural\Adapter;

class ClassAdapter extends Adaptee implements Target
{
    public function request(): void
    {
        $this->specialRequest();
    }
}
