<?php
declare(strict_types=1);

namespace design\structural\Decorator;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function test(): void
    {

        // 门面模式
        // Component 抽象组件
        // Decorator 装饰者组件
        // ConcreteComponent 抽象装饰者组件
        // ConcreteDecorator 具体装饰者组件


        $decorator = new ConcreteComponent();
        $decorator = new ConcreteDecoratorAuth($decorator);
        $decorator->request();

        $this->assertTrue(true);
    }
}