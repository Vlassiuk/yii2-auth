<?php

/*
 * 
 */

namespace vlassiuk\auth;

use Yii;
use yii\base\Event;
use vlassiuk\auth\interfaces\IEvents;

/**
 * Description of Auth
 *
 * @author vlas
 */
class Auth extends \yii\base\Component implements IEvents
{

    /**
     *
     * @param \yii\authclient\ClientInterface $client
     */
    public function onAuthSuccess(\yii\authclient\ClientInterface $client)
    {
        $userAccount = self::getModule()->userAccountClass;
        $account = $userAccount::findAccount($client);

        if ($account) {
            if (Yii::$app->user->isGuest) {
                self::authorization($account->user);
            }
        } else {
            if (Yii::$app->user->isGuest) {
                $account = self::registration($client);
                self::authorization($account->user);
            } else {
                self::addUserAccount($client, Yii::$app->user->id);
            }
        }
    }

    /**
     *
     * @param \yii\web\IdentityInterface $user
     */
    private static function authorization(\yii\web\IdentityInterface $user)
    {
        $beforeEvent = new \vlassiuk\auth\events\BeforeLoginEvent(['user' => $user]);
        Event::trigger(self::className(), IEvents::EVENT_BEFORE_LOGIN, $beforeEvent);

        if ($beforeEvent->canLogin) {
            $success = Yii::$app->user->login($user);

            $afterEvent = new \vlassiuk\auth\events\AfterLoginEvent([
                'user' => $user,
                'success' => $success
            ]);
            Event::trigger(self::className(), IEvents::EVENT_AFTER_LOGIN, $afterEvent);
        }
    }

    /**
     *
     * @param \vlassiuk\auth\interfaces\IProfile $client
     * @return \vlassiuk\auth\interfaces\IUserAccount
     */
    private static function registration(IProfile $client)
    {
        $userClass = self::getModule()->userClass;
        $user = $userClass::findByIdentity($client);

        if (!$user) {
            $user = $userClass::createUser($client);
        }

        $account = self::addUserAccount($client, $user->id);

        $connectionEvent = new \vlassiuk\auth\events\UserAccountConnectionEvent(['account' => $account]);
        Event::trigger(self::className(), IEvents::EVENT_USERACCOUNT_CONNECTION, $connectionEvent);

        $CreationEvent = new \vlassiuk\auth\events\UserCreationEvent([
            'client' => $client,
            'user' => $user,
        ]);
        Event::trigger(self::className(), IEvents::EVENT_USER_CREATION, $CreationEvent);

        return $account;
    }

    /**
     *
     * @param \vlassiuk\auth\interfaces\IProfile $client
     * @param type $id
     * @return type
     */
    private static function addUserAccount(IProfile $client, $id)
    {
        $userAccount = self::getModule()->userAccountClass;
        $account = $userAccount::createAccount($client, $id);

        $event = new \vlassiuk\auth\events\UserAccountCreationEvent(['account' => $account]);
        Event::trigger(self::className(), IEvents::EVENT_USERACCOUNT_CREATION, $event);

        return $account;
    }

    /**
     *
     * @return \vlassiuk\auth\Module
     */
    protected static function getModule()
    {
        return Yii::$app->getModule('auth');
    }
}
