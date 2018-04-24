<?php

namespace backend\components\event;

use yii\base\Event;

class MailEvent extends Event
{
    public $email;

    public $subject;

    public $content;
}