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
class UserAccountCreationEvent extends \yii\base\Event
{

    /**
     *
     * @var \vlassiuk\auth\interfaces\IUserAccount
     */
    protected $account;

    /**
     *
     * @param \vlassiuk\auth\interfaces\IUserAccount $account
     */
    public function setAccount(\vlassiuk\auth\interfaces\IUserAccount $account)
    {
        $this->account = $account;
    }

    /**
     *
     * @return \vlassiuk\auth\interfaces\IUserAccount
     */
    public function getAccount()
    {
        return $this->account;
    }

}
