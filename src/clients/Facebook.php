<?php

/*
 *
 */


namespace vlassiuk\auth\clients;


use yii\authclient\clients\Facebook as YiiFacebook;
use vlassiuk\auth\interfaces\IProfile;
use vlassiuk\auth\interfaces\IPersonalProfile;

/**
 * Description of Google
 *
 * @author vlas
 */
class Facebook extends YiiFacebook implements IProfile, IPersonalProfile
{
    const GRAPH_FB = 'https://graph.facebook.com/';


    public function getEmail()
    {
        return array_key_exists('email', $this->getUserAttributes()) ? $this->getUserAttributes()['email'] : null;
    }

    public function getUsername()
    {
        return array_key_exists('name', $this->getUserAttributes()) ? $this->getUserAttributes()['name'] : null;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return array_key_exists('first_name', $this->getUserAttributes()) ? $this->getUserAttributes()['first_name'] : null;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return array_key_exists('last_name', $this->getUserAttributes()) ? $this->getUserAttributes()['last_name'] : null;
    }

    /**
     * @return string
     */
    public function getPictureLink()
    {
        return self::GRAPH_FB . $this->getUserAttributes()['id'] . '/picture/?type=large';
    }
}
