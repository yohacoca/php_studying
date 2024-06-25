<?php

namespace algorithm\base\sort;

class Bubble
{
    // bubble 基础的冒泡排序
    public static function bubble(&$data){
        $len = count($data);
        while ($len > 1){
            for ($i = 0; $i < $len - 1; $i ++){
                if($data[$i] > $data[$i + 1]){
                    $temp = $data[$i];
                    $data[$i] = $data[$i + 1];
                    $data[$i + 1] = $temp;
                }
            }
            $len -= 1;
        }
    }

    // bubble_2
    // 优化添加交换变量, 若某次没有交换则证明提前排序完成
    public static function bubble_2(&$data){
        $isSwap = false;
        $len = count($data);
        while ($len > 1){
            for ($i = 0; $i < $len - 1; $i ++){
                if($data[$i] > $data[$i + 1]){
                    $isSwap = true;
                    $temp = $data[$i];
                    $data[$i] = $data[$i + 1];
                    $data[$i + 1] = $temp;
                }
            }
            if (!$isSwap){
                break;
            }
            $isSwap = false;
            $len -= 1;
        }
    }

}