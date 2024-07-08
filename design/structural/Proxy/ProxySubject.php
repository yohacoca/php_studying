<?php
declare(strict_types=1);

namespace design\structural\Proxy;

class ProxySubject implements Subject
{
    private RealSubject $realSubject;

    public function __construct()
    {
        $realSubject = new RealSubject();
        $this->realSubject = $realSubject;
    }

    function preRequest(): void
    {
        echo "proxy preRequest".PHP_EOL;
    }
    function request(): void
    {
        $this->preRequest();

        $this->realSubject->request();

        $this->postRequest();
    }
    function postRequest(): void
    {
        echo "proxy postRequest".PHP_EOL;
    }
}