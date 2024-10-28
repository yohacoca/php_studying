<?php
declare(strict_types=1);

namespace tools\package\email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPUnit\Framework\TestCase;

class Email extends TestCase
{

    function test()
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
        $mail->Port = 465;


        //-------------  发件人设置 -----------
        //
        $mail->setFrom('23426945@qq.com', '又拍云');
        #收件人列表,可将邮件发送给多个邮箱,命令格式:
        //$mail->addAddress('收件人邮箱', '姓名');
        $mail->addAddress('848978691@qq.com', '李知恩');
        $mail->addAddress('3276205785@qq.com', '灰太狼的羊');
        #回复地址
        $mail->addReplyTo('23426945@qq.com', '李钟硕');
        #抄送人列表
        $mail->addCC('itqaqcom@163.com', '你的欲梦');
        # 邮件内容
        //电子邮件格式设置为HTML
        $mail->isHTML(true);
        //邮件标题
        $mail->Subject = '又拍云密码重置校验';
        //邮件内容
        $code = mt_rand(100000, 999999);
        $mail->Body = "您的验证码为: <b>{$code}</b>";
        //这个是设置纯文本方式显示的正文内容,如果不支持Html方式,就会用到这个,基本无用
        $mail->AltBody = "您的验证码为: {$code}";
        #发送邮件
        $mail->send();
        echo '邮件发送成功';

        // $e->getMessage() // 异常信息
        // $mail->ErrorInfo // 邮件发送失败错误信息
        echo "邮件发送失败: {$mail->ErrorInfo}";
    }
}