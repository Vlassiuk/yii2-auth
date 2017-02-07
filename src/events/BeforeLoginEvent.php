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
class BeforeLoginEvent extends \yii\base\Event
{
    public $canLogin = true;

    /**
     *
     * @var \yii\web\IdentityInterface
     */
    protected $user;

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
