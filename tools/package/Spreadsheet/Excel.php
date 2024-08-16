<?php
declare(strict_types=1);

namespace tools\package\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPUnit\Framework\TestCase;

// 安装 composer require phpoffice/phpspreadsheet
// 文档安装 composer require phpoffice/phpspreadsheet --prefer-source

class Excel extends TestCase
{

    // test_create 创建excel文件测试
    public function test_create()
    {

        $spreadsheet = new Spreadsheet();
        $xlsx = new Xlsx($spreadsheet);
        $xlsx->save('hello.xlsx');

        $this->assertTrue(true);
    }


    // test_reader 读取excel文件测试
    public function test_reader()
    {

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load('hello.xlsx');
        $worksheet = $spreadsheet->getActiveSheet();
        $row = $worksheet->getHighestRow(); // 总行数
        $column = $worksheet->getHighestColumn(); // 总列数

        $this->assertTrue(true);
    }

    // test_writer 读取excel文件测试
    public function test_writer()
    {

        // 创建一个sheet对象
        $spreadsheet = new Spreadsheet();

        // 创建一个新的表
        $worksheet = $spreadsheet->getActiveSheet();
        // 设置表名
        $worksheet->setTitle('测试表');

        // 创建一个文件 将sheet保存
        $xlsx = new Xlsx($spreadsheet);
        $xlsx->save('hello.xlsx');

        $this->assertTrue(true);
    }

}