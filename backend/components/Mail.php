<?php

namespace backend\components;

use Yii;

class Mail
{
    public static function sendMail ($event)
    {
        $mail= Yii::$app->mailer->compose();
        $mail->setTo($event->email); //要发送给那个人的邮箱
        $mail->setSubject($event->subject); //邮件主题
        $mail->setTextBody($event->content); //发布纯文字文本

        return $mail->send();
    }
}