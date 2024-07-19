<?php
declare(strict_types=1);

namespace design\structural\Proxy;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function test()
    {

        // 代理模式
        // ProxySubject 代理主题对象
        // RealSubject 真实主题对象
        // Subject 主题接口

        // 简单来说, 代理主题和真实主题共同实现主题接口
        // 代理主题关联真实主题
        // 在想要调用真实主题方法的时候,
        // 由代理主题里的同名方法去调用真是主题方法, 能够做前置准备或其它准备,
        $proxy = new ProxySubject();
        $proxy->request();

        $this->assertTrue(true);
    }
}