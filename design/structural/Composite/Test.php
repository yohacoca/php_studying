<?php
declare(strict_types=1);

namespace design\structural\Composite;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function test():void
    {

        // 门面模式
        // Component 抽象根节点
        // Composite 树枝节点
        // Leaf 叶子节点

        // 简单来说, 树枝节点和叶子节点共同实现抽象根节点
        // 而树枝节点关联多个叶子节点

        $composite = new Composite('composite');
        $composite->add(new Leaf('leaf_1'));
        $composite->add(new Leaf('leaf_2'));
        $composite->operation();

        $this->assertTrue(true);
    }
}