<?php

namespace test\design;

use design\structural\Adapter\ClassAdapter;
use design\structural\Adapter\Target;

class Structural
{
    public function Adaptee(): void
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

    }

    public function Bridge(): void
    {
        // 桥接模式


    }
}