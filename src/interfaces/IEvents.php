<?php

/*
 *
 */

namespace vlassiuk\auth\interfaces;

/**
 *
 * @author vlas
 */
interface IEvents
{
    const EVENT_BEFORE_LOGIN = 'auth.before.login';
    const EVENT_AFTER_LOGIN = 'auth.after.login';

    const EVENT_USER_CREATION = 'auth.user.creation';

    const EVENT_USERACCOUNT_CREATION = 'auth.useraccount.creation';
    const EVENT_USERACCOUNT_CONNECTION = 'auth.useraccount.connection';

}
