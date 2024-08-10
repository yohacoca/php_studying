<?php
declare(strict_types=1);

namespace tools\package\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPUnit\Framework\TestCase;

// 安装 composer require phpoffice/phpspreadsheet
// 文档安装 composer require phpoffice/phpspreadsheet --prefer-source

class Excel extends TestCase
{

    // test_save 创建excel文件测试
    public function test_save()
    {

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Hello World !');
        $writer = new Xlsx($spreadsheet);
        $writer->save('hello world.xlsx');

        $this->assertTrue(true);
    }
}