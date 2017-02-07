<?php

/*
 * 
 */

namespace vlassiuk\auth\interfaces;

/**
 *
 * @author vlas
 */
interface IUserManagment
{

    /**
     * 
     * @param \vlassiuk\auth\interfaces\IProfile $client
     */
    static function findByIdentity(IProfile $client);

    /**
     *
     * @param \vlassiuk\auth\interfaces\IProfile $client
     */
    static function createUser(IProfile $client);
}
