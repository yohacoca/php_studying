<?php
declare(strict_types=1);

namespace tools\package\file;

use PHPUnit\Framework\TestCase;

class FIle extends TestCase
{

//    'w' ：写入模式，如果文件已存在，则清空文件内容；如果文件不存在，则创建新文件。
//    'w+'：可读写模式，同样会清空文件内容或创建新文件。
//    'a' ：追加模式，如果文件已存在，指针将指向文件末尾，不会清空现有内容；如果文件不存在，则创建新文件。
//    'a+'：可读写模式，追加模式，若文件不存在则创建新文件。

    // 打开一个文件
    public function test_create_file(): void
    {
        $file = "output.txt";

        $file = fopen($file, 'w');
        if ($file) {
            $content = "hello world";
            fwrite($file, $content);
            fclose($file);
        }
        $this->assertTrue(true);
    }


    // 读取一个文件
    public function test_read_file(): void
    {
        $file = "output.txt";

        $file = fopen($file, 'r');
        if ($file) {

            while (($line = fgets($file)) !== false) {
                echo $line;
            }
            fclose($file);
        }

        $this->assertTrue(true);
    }


}