<?php
declare(strict_types=1);

namespace tools\package\pdf;

use PHPUnit\Framework\TestCase;
use TCPDF;

class Pdf extends TestCase
{
    // 打开一个文件
    public function test_create_file(): void
    {
        // 创建新 PDF 文档
        $pdf = new TCPDF();

        // 设置文档信息
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Sample PDF');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // 设置默认头部和脚部信息
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // 添加一页
        $pdf->AddPage();

        // 设置字体
        $pdf->SetFont('helvetica', 'B', 20);

        // 添加文本
        $pdf->Cell(0, 10, 'Hello World!', 0, 1, 'C');

        // 输出 PDF 文件
        $pdf->Output('example.pdf', 'I'); // I 表示在浏览器中查看，D 表示下载，F 表示保存到服务器

        $this->assertTrue(true);
    }

}