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

        // 简单来说, 树枝节点和叶子节点共同实现抽象根节点
        // 而树枝节点关联多个叶子节点



        $this->assertTrue(true);
    }
}