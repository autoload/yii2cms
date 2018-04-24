<?php


namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * 事件测试
 * @see http://www.manks.top/document/yii2-event.html
 */
class EventTestController extends Controller
{
    const EVENT_TEST = 'event_test';

    public function init ()
    {
        parent::init();
        $this->on(self::EVENT_TEST, function () {
            echo "I`m a test event.";
        });
    }

    public function actionIndex ()
    {
        $this->trigger(self::EVENT_TEST);
    }
}