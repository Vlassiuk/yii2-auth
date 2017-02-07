<?php

/*
 *
 */

namespace vlassiuk\auth\interfaces;

/**
 *
 * @author vlas
 */
interface IUserAccount
{

    /**
     *
     * @param \yii\authclient\ClientInterface $client
     * @return
     */
    static public function findAccount(\yii\authclient\ClientInterface $client);

    /**
     *
     * @param \yii\authclient\ClientInterface $client
     * @param type $id
     * @return
     */
    static public function createAccount(\yii\authclient\ClientInterface $client, $id = null); // createAccount

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser();

}
