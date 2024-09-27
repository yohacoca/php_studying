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
            // 写入数据到文件
            fwrite($file, $content);
            fclose($file);
        }
        $this->assertTrue(true);
    }


    // 读取一个文件
    public function test_read_file(): void
    {
        $file = "output.txt";

        //--------方法一--------------
        //        将文件的每一行读入数组
            //        $lines = file($file);
        //--------方法一--------------

        //--------方法二--------------
        $file = fopen($file, 'r');
        if ($file) {

            while (($line = fgets($file)) !== false) {
                echo $line;
            }
            fclose($file);
        }
        //--------方法二--------------

        $this->assertTrue(true);
    }


    // 关联函数
//    unlink(): 删除文件
//    file_exists(): 检查文件或目录是否存在
//    is_file(): 判断路径是否为文件
//    filesize(): 获取文件大小
//    is_dir(): 判断路径是否为目录
//    mkdir(): 创建目录
//    rmdir(): 删除空目录
//    scandir(): 获取目录中的文件和目录列表
}