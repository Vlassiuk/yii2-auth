<?php

/*
 * 
 */

namespace vlassiuk\auth;

use Yii;

/**
 * Description of Logger
 *
 * @author vlas
 */
class Logger extends \yii\base\Component
{

    public static function onBeforeLogin(\app\modules\auth\events\BeforeLoginEvent $event)
    {
        $rez = $event->canLogin ? 'can' : 'banned';

        Yii::info('check/login >> ' . $rez, __METHOD__);
    }

    public static function onUserCreation(\app\modules\auth\events\UserCreationEvent $event)
    {
        Yii::info('User created: ' . $event->user->getId(), __METHOD__);
    }

    public static function onUserAccountCreation(\app\modules\auth\events\UserAccountCreationEvent $event)
    {
        Yii::info('UserAccount Connect: ' , __METHOD__); // $event->getAccount()
    }

    public static function onUserAccountConnection(\app\modules\auth\events\UserAccountConnectionEvent $event)
    {
        Yii::info('User created: ' , __METHOD__);
    }

}
