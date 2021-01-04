<?php

namespace GGGGino\RecentyBundle\Storage;

use Doctrine\Common\Collections\Criteria;
use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Interface StorageInterface
 * @package GGGGino\RecentyBundle\Storage
 */
interface StorageInterface
{
    /**
     * @param RecentyInterface $recenty
     */
    public function save(RecentyInterface $recenty);

    /**
     * @param WrapperInterface $wrapper
     * @param mixed $extra
     * @return RecentyInterface[]
     */
    public function retrieveCustom(WrapperInterface $wrapper, $extra);

    /**
     * @param WrapperInterface $wrapper
     * @return RecentyInterface
     */
    public function retrieveStrict(WrapperInterface $wrapper);
}