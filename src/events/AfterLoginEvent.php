<?php

/*
 *
 */

namespace vlassiuk\auth\events;

/**
 * Description of AfterLoginEvent
 *
 * @author vlas
 */
class AfterLoginEvent extends \yii\base\Event
{

    public $success;

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
