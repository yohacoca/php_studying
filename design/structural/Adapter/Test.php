<?php
declare(strict_types=1);

namespace design\structural\Adapter;

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{

    public function test(): void
    {

        // 适配者模式
        // Target 目标对象
        // Adaptee 适配者
        // Adapter 适配器

        // 简单来说, 目前我只能支持Target类型, 但我需要使用Adaptee里面的方法,
        // 就需要适配器实现Target继承Adaptee或依赖Adaptee

        // func 只支持Target
        $func = function(Target $target){
            $target->request();
        };

        // 类适配器 或者 对象适配器 $adapter = new ObjectAdapter();
        $adapter = new ClassAdapter();

        // 想要使用 Adaptee 的 specialRequest()
        $func($adapter);

        $this->assertTrue(true);
    }

}