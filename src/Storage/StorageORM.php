<?php

namespace GGGGino\RecentyBundle\Storage;

use Doctrine\ORM\EntityManagerInterface;
use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Class StorageORM
 * @package GGGGino\RecentyBundle\Storage
 */
class StorageORM implements StorageInterface
{
    public function __construct(EntityManagerInterface $em)
    {
    }

    /**
     * @inheritDoc
     */
    public function save(WrapperInterface $wrapper)
    {
        // TODO: Implement save() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineAll(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineAll() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineContext(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineContext() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntityType(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineEntityType() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntity(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineEntity() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveStrict(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveStrict() method.
    }
}