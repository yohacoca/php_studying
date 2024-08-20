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

    // test_create 创建文件测试
    public function test_create(): void
    {

        $spreadsheet = new Spreadsheet();
        $xlsx = new Xlsx($spreadsheet);
        $xlsx->save('hello.xlsx');

        $this->assertTrue(true);
    }


    // test_reader 加载文件测试
    public function test_load(): void
    {

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load('hello.xlsx');

        $this->assertTrue(true);
    }

    public function test_activate()
    {

    }

    // test_writer 写入单元格
    public function test_writer(): void
    {

        $spreadsheet = new Spreadsheet();
        $activeSheet = $spreadsheet->getActiveSheet();

        // 保存
        $xlsx = new Xlsx($spreadsheet);
        $xlsx->save('hello.xlsx');

        $this->assertTrue(true);
    }

}