<?php

namespace GGGGino\RecentyBundle\Storage;

use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Interface StorageInterface
 * @package GGGGino\RecentyBundle\Storage
 */
interface StorageInterface
{
    /**
     * @param WrapperInterface $wrapper
     */
    public function save(WrapperInterface $wrapper);

    /**
     * @param WrapperInterface $wrapper
     * @return RecentyInterface[]
     */
    public function retrieveMineAll(WrapperInterface $wrapper);

    /**
     * @param WrapperInterface $wrapper
     * @return RecentyInterface[]
     */
    public function retrieveMineContext(WrapperInterface $wrapper);

    /**
     * @param WrapperInterface $wrapper
     * @return RecentyInterface[]
     */
    public function retrieveMineEntityType(WrapperInterface $wrapper);

    /**
     * @param WrapperInterface $wrapper
     * @return RecentyInterface[]
     */
    public function retrieveMineEntity(WrapperInterface $wrapper);

    /**
     * @param WrapperInterface $wrapper
     * @return RecentyInterface[]
     */
    public function retrieveStrict(WrapperInterface $wrapper);
}