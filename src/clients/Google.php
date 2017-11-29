<?php

/*
 * 
 */

namespace vlassiuk\auth\clients;

use yii\authclient\clients\Google as YiiGoogle;
use vlassiuk\auth\interfaces\IProfile;
use vlassiuk\auth\interfaces\IPersonalProfile;

/**
 * Description of Google
 *
 * @author vlas
 */
class Google extends YiiGoogle implements IProfile, IPersonalProfile
{
    public function getEmail()
    {
        if (array_key_exists('emails', $this->getUserAttributes())) {
            foreach ($this->getUserAttributes()['emails'] as $item) {
                if (array_key_exists('value', $item)) {
                    return $item['value'];
                }
            }
        }

        return null;
    }

    // TODO: remove it
    public function getUsername()
    {
        return array_key_exists('displayName', $this->getUserAttributes()) ? $this->getUserAttributes()['displayName'] : null;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        if (!array_key_exists('name', $this->getUserAttributes())) {
            return null;
        }
        $name = $this->getUserAttributes()['name'];

        return array_key_exists('givenName', $name) ? $name['givenName'] : null;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        if (!array_key_exists('name', $this->getUserAttributes())) {
            return null;
        }
        $name = $this->getUserAttributes()['name'];

        return array_key_exists('familyName', $name) ? $name['familyName'] : null;
    }

    /**
     * @return string
     */
    public function getPictureLink()
    {
        if (!array_key_exists('image', $this->getUserAttributes())) {
            return null;
        }
        $image = $this->getUserAttributes()['image'];

        return array_key_exists('url', $image) ? $image['url'] : null;
    }

}
