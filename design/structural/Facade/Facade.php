<?php
declare(strict_types=1);

namespace design\structural\Facade;

class Facade
{
    private SubSystem1 $subSystem1;
    private SubSystem2 $subSystem2;

    public function __construct()
    {
        $this->subSystem1 = new SubSystem1;
        $this->subSystem2 = new SubSystem2;
    }

    public function request(): void
    {
        $this->subSystem1->request();
        $this->subSystem2->request();
    }

}