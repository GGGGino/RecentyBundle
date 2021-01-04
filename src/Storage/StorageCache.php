<?php

namespace GGGGino\RecentyBundle\Storage;

use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;
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
     * @inheritDoc
     */
    public function save(RecentyInterface $recenty)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        $rows[WrapperUtility::getHash($recenty)] = $recenty;

        $this->cache->set(static::KEY, $rows);
    }

    /**
     * @inheritDoc
     */
    public function retrieveStrict(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        $rowsFiltered = array_filter($rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext()
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId()
                && $recenty->getEntityId() === $wrapper->getEntityId();
        });

        return reset($rowsFiltered);
    }

    /**
     * @inheritDoc
     */
    public function retrieveCustom(WrapperInterface $wrapper, $extra)
    {
        /** @var RecentyInterface[] $rows */
        $rows = $this->cache->get(static::KEY);

        return array_filter($rows, function (RecentyInterface $recenty) use ($extra) {
            if (isset($extra['userId']) && $recenty->getUserId() !== $extra['userId']) { return false; }

            if (isset($extra['context']) && $recenty->getContext() !== $extra['context']) { return false; }

            if (isset($extra['entityTypeId']) && $recenty->getEntityTypeId() !== $extra['entityTypeId']) { return false; }

            if (isset($extra['entityId']) && $recenty->getEntityId() !== $extra['entityId']) { return false; }

            return true;
        });
    }
}