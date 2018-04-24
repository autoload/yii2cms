<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\components\event\MailEvent;


/**
 * 发送邮件
 * @see http://www.manks.top/document/yii2-event-example.html
 */
class SendMailController extends Controller
{
    const SEND_MAIL = 'send_mail';

    public function init ()
    {
        parent::init();

        // 绑定邮件类，当事件触发的时候，调用我们刚刚定义的邮件类Mail
        $this->on(self::SEND_MAIL, ['backend\components\Mail', 'sendMail']);
    }

    public function actionsIndex(){
        return '邮件管理';
    }

    public function actionSend ()
    {
        return '邮件发送';

        // 触发邮件事件
        /*
        $event = new MailEvent;
        $event->email = '383756034@qq.com';
        $event->subject = '事件邮件测试';
        $event->content = '邮件测试内容';

        $this->trigger(self::SEND_MAIL, $event);
        */
    }
}