<?php

/*
 *
 */

namespace vlassiuk\auth\clients;

use yii\authclient\clients\VKontakte as YiiVKontakte;
use vlassiuk\auth\interfaces\IProfile;
use vlassiuk\auth\interfaces\IPersonalProfile;

/**
 * Description of VKontakte
 *
 * @author vlas
 */
class VKontakte extends YiiVKontakte implements IProfile, IPersonalProfile
{

    /** @inheritdoc */
    public $scope = 'email';

    public function getEmail()
    {
        return $this->getAccessToken()->getParam('email');
    }

    /**
     *
     * @return string
     */
    public function getFirstname()
    {
        return isset($this->getUserAttributes()['first_name'])
            ? $this->getUserAttributes()['first_name']
            : null;
    }

    /**
     *
     * @return string
     */
    public function getLastname()
    {
        return isset($this->getUserAttributes()['last_name'])
            ? $this->getUserAttributes()['last_name']
            : null;
    }

    /**
     *
     * @return string
     */
    public function getPictureLink()
    {
        return isset($this->getUserAttributes()['photo'])
            ? $this->getUserAttributes()['photo']
            : null;
    }

    /**
     * 
     * @return string
     */
    public function getUsername()
    {
        return isset($this->getUserAttributes()['screen_name'])
            ? $this->getUserAttributes()['screen_name']
            : null;
    }

}
