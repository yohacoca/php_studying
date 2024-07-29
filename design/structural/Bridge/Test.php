<?php
declare(strict_types=1);

namespace design\structural\Bridge;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function test():void
    {

        // 桥接模式
        // Abstraction 抽象类
        // RefinedAbstraction 提炼抽象类
        // Implementor 实现类
        // ConcreteImplementor 具体实现类

        $refined = new RefinedAbstraction();

        $refined->set(new ConcreteImplementor());

        $refined->feature();

        $this->assertTrue(true);
    }

}