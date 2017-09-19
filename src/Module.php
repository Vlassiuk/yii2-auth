<?php

namespace vlassiuk\auth;

use yii\base\Event;
use vlassiuk\auth\interfaces\IEvents;

/**
 * auth module definition class
 */
class Module extends \yii\base\Module
{

    /**
     *
     * @var string
     */
    public $userClass = 'app\models\user\User';

    /**
     *
     * @var string
     */
    public $userAccountClass = 'app\models\user\UserAccount';

    /**
     *
     * @var string
     */
    public $loggerClass = 'vlassiuk\auth\Logger';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on('vlassiuk\auth\interfaces\IEvents', IEvents::EVENT_BEFORE_LOGIN, [$this->userClass, 'checkAccess']);

        $this->logging();
    }

    protected function logging()
    {
        Event::on('vlassiuk\auth\interfaces\IEvents', IEvents::EVENT_BEFORE_LOGIN, [$this->loggerClass, 'onBeforeLogin']);
        Event::on('vlassiuk\auth\interfaces\IEvents', IEvents::EVENT_USER_CREATION, [$this->loggerClass, 'onUserCreation']);

        Event::on('vlassiuk\auth\interfaces\IEvents', IEvents::EVENT_USERACCOUNT_CREATION, [$this->loggerClass, 'onUserAccountCreation']);
        Event::on('vlassiuk\auth\interfaces\IEvents', IEvents::EVENT_USERACCOUNT_CONNECTION, [$this->loggerClass, 'onUserAccountConnection']);
    }

}
