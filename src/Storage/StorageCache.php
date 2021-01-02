<?php

namespace GGGGino\RecentyBundle\Storage;

use Doctrine\ORM\EntityManagerInterface;
use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;
use Psr\Cache\CacheItemInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * Class StorageCache
 * @package GGGGino\RecentyBundle\Storage
 */
class StorageCache implements StorageInterface
{
    const KEY = 'recenty';

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * StorageCache constructor.
     * @param CacheInterface $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param WrapperInterface $wrapper
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function save(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        if (!isset($rows[WrapperUtility::getHash($wrapper)])) {
            $recenty = WrapperUtility::createRecenty($wrapper);

            $rows[WrapperUtility::getHash($wrapper)] = $recenty;
            return;
        }

        $recenty = $rows[WrapperUtility::getHash($wrapper)];

        $rows[WrapperUtility::getHash($wrapper)] = WrapperUtility::updateRecenty($wrapper, $recenty);

        $this->cache->set(static::KEY, $rows);
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineAll(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        return array_filter($rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineContext(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        return array_filter($rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntityType(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        return array_filter($rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext()
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntity(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        return array_filter($rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext()
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId()
                && $recenty->getEntityId() === $wrapper->getEntityId();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveStrict(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        return array_filter($rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext()
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId()
                && $recenty->getEntityId() === $wrapper->getEntityId();
        });
    }
}