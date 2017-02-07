<?php

/*
 *
 */

namespace vlassiuk\auth\events;

/**
 * Description of AuthorizationEvent
 *
 * @author vlas
 *
 * @property yii\web\IdentityInterface $user
 */
class UserCreationEvent extends \yii\base\Event
{

    /**
     *
     * @var \vlassiuk\auth\interfaces\IProfile
     */
    protected $client;

    /**
     *
     * @var \yii\web\IdentityInterface
     */
    protected $user;

    /**
     *
     * @param \vlassiuk\auth\interfaces\IProfile $client
     */
    public function setClient(\vlassiuk\auth\interfaces\IProfile $client)
    {
        $this->client = $client;
    }

    /**
     *
     * @return \vlassiuk\auth\interfaces\IProfile
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     *
     * @param \yii\web\IdentityInterface $user
     */
    public function setUser(\yii\web\IdentityInterface $user)
    {
        $this->user = $user;
    }

    /**
     *
     * @return \yii\web\IdentityInterface
     */
    public function getUser()
    {
        return $this->user;
    }

}
