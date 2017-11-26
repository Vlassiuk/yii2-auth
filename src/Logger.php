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

    public static function onBeforeLogin(\vlassiuk\auth\events\BeforeLoginEven $event)
    {
        $rez = $event->canLogin ? 'can' : 'banned';

        Yii::info('check/login >> ' . $rez, __METHOD__);
    }

    public static function onUserCreation(\vlassiuk\auth\events\UserCreationEvent $event)
    {
        Yii::info('User created: ' . $event->user->getId(), __METHOD__);
    }

    public static function onUserAccountCreation(\vlassiuk\auth\events\UserAccountCreationEvent $event)
    {
        Yii::info('UserAccount Connect: ' , __METHOD__); // $event->getAccount()
    }

    public static function onUserAccountConnection(\vlassiuk\auth\events\UserAccountConnectionEvent $event)
    {
        Yii::info('User created: ' , __METHOD__);
    }

}
