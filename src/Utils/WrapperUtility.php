<?php

namespace GGGGino\RecentyBundle\Utils;

use GGGGino\RecentyBundle\Model\Recenty;
use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Class WrapperUtility
 * @package GGGGino\RecentyBundle\Utils
 */
class WrapperUtility
{
    /**
     * @param WrapperInterface $wrapper
     * @return string
     */
    public static function getHash(WrapperInterface $wrapper)
    {
        return sprintf("%s%s%s%s",
            strval($wrapper->getUserId()),
            strval($wrapper->getEntityTypeId()),
            strval($wrapper->getEntityId()),
            strval($wrapper->getContext()));
    }

    /**
     * @param WrapperInterface $wrapper
     * @return string
     */
    public static function createRecenty(WrapperInterface $wrapper)
    {
        $newRecenty = new Recenty();
        $newRecenty->setUserId($wrapper->getUserId());
        $newRecenty->setEntityTypeId($wrapper->getEntityTypeId());
        $newRecenty->setEntityId($wrapper->getEntityId());
        $newRecenty->setContext($wrapper->getContext());

        return $newRecenty;
    }

    /**
     * @param WrapperInterface $wrapper
     * @param RecentyInterface $recenty
     * @return string
     */
    public static function updateRecenty(WrapperInterface $wrapper, RecentyInterface $recenty)
    {
        $recenty->setEntityTypeId($wrapper->getEntityTypeId());
        $recenty->setEntityId($wrapper->getEntityId());
        $recenty->setContext($wrapper->getContext());
    }
}