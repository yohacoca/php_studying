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
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,true, 'UTF-8', false);

        //设置文件信息
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("jack");
        $pdf->SetTitle("pdf test");
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        //删除预定义的打印 页眉/页尾
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        //设置默认等宽字体
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //设置自动分页符

        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // 输入PDF文档
        // Name：PDF保存的名字
        // Dest：PDF输出的方式
        // I，默认值 在浏览器中打开
        // D，点击下载按钮 PDF文件会被下载下来
        // F，文件会被保存在服务器中
        // S，PDF会以字符串形式输出
        // E：PDF以邮件的附件输出
        $pdf->Output(__DIR__ . '/test001.pdf', 'F'); // 使用 __DIR__ 获取当前目录

        $this->assertTrue(true);
    }

}