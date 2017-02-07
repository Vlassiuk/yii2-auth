<?php

/*
 * 
 */

namespace vlassiuk\auth\interfaces;

/**
 *
 * @author vlas
 */
interface IPersonalProfile
{

    /**
     * @return string
     */
    function getFirstname();

    /**
     * @return string
     */
    function getLastname();

    /**
     * @return string
     */
    function getPictureLink();
}
