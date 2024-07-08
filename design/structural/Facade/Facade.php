<?php
declare(strict_types=1);

namespace design\structural\Facade;

class Facade
{
    private SubSystem1 $subSystem1;
    private SubSystem2 $subSystem2;

    public function __construct(SubSystem1 $subSystem1, SubSystem2 $subSystem2)
    {
        $this->subSystem1 = $subSystem1;
        $this->subSystem2 = $subSystem2;
    }

    public function request(): void
    {
        $this->subSystem1->request();
        $this->subSystem2->request();
    }

}