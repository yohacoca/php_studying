<?php

use algorithm\base\sort\Bubble;

class App
{
    public function run()
    {
        $this->sort();
    }

    public function sort(){
        // 待排序数组
        $array = [64, 34, 25, 12, 22, 11, 90];
        Bubble::bubble($array);
        print_r($array);
    }



}