<?php
declare(strict_types=1);

namespace tools\package\email;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Framework\TestCase;

class Email extends TestCase
{

    function test_send()
    {
        //设定邮件编码,默认ISO-8859-1,如果发中文此项必须设置，否则乱码
        $mail = new PHPMailer(true);

        //-------------  服务器设置 -----------
        // 设定邮件编码,默认ISO-8859-1,如果发中文此项必须设置，否则乱码
        $mail->CharSet = 'UTF-8';
        // 使用SMTP发送
        $mail->isSMTP();
        // SMTP服务器
        $mail->Host = 'smtp.qq.com';
        // 启用SMTP身份验证
        $mail->SMTPAuth = true;
        // SMTP用户名
        $mail->Username = '2448202116@qq.com';
        // SMTP密码
        $mail->Password = 'ccoohwffwhamebbj';
        // 启用隐式TLS加密
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        // TCP端口
        $mail->Port = 587;


        //-------------  发件人设置 -----------
        try {
            // 发件人信息
            $mail->setFrom('2448202116@qq.com', 'author');
            // 收件人(可多选)
            $mail->addAddress('cocacolalinjun@163.com', '1');
            $mail->addAddress('cocacolalinjun@gmail.com', '2');
            // 回复地址
            $mail->addReplyTo('2448202116@qq.com', 'author_back');
            // 抄送人列表
            $mail->addCC('2448202116@163.com', 'author_addCC');
            // 邮件格式设置为HTML
            $mail->isHTML(true);
            // 邮件标题
            $mail->Subject = 'test mail';
            # 邮件内容
            $mail->Body = "您的验证码为: <h1>{test mail}</h1>";
            # 发送
            $mail->send();
        } catch (Exception $e) {
            var_dump($e->getMessage());
            var_dump($mail->ErrorInfo);
            $this->fail();
        }
        #发送邮件
        echo '邮件发送成功';
        $this->assertTrue(true);
    }
}