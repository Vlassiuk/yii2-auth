<?php

/*
 *
 */

namespace vlassiuk\auth\interfaces;

/**
 *
 * @author vlas
 */
interface IUserAccessing
{

    /**
     *
     * @param \vlassiuk\auth\events\BeforeLoginEvent $event
     */
    static function checkAccess(\vlassiuk\auth\events\BeforeLoginEvent $event);
}
