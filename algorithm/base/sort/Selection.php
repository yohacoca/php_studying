<?php
declare(strict_types=1);

namespace algorithm\base\sort;

class Selection
{
    // selection 基础的选择排序
    public static function selection(&$data): void
    {
        $len = count($data);
        for ($i = 0; $i < $len; $i++) {
            $minIndex = $i;
            for ($j = $i + 1; $j < $len; $j++) {
                if ($data[$j] < $data[$minIndex]) {
                    $minIndex = $j;
                }
            }
            $temp = $data[$i];
            $data[$i] = $data[$minIndex];
            $data[$minIndex] = $temp;
        }
    }
}