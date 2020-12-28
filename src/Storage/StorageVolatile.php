<?php

namespace GGGGino\RecentyBundle\Storage;

use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Class StorageVolatile
 * @package GGGGino\RecentyBundle\Storage
 */
class StorageVolatile implements StorageInterface
{
    /**
     * @var RecentyInterface[]
     */
    private $rows;

    /**
     * @inheritDoc
     */
    public function save(WrapperInterface $wrapper)
    {
        if (!isset($this->rows[WrapperUtility::getHash($wrapper)])) {
            $recenty = WrapperUtility::createRecenty($wrapper);

            $this->rows[WrapperUtility::getHash($wrapper)] = $recenty;
            return;
        }

        $recenty = $this->rows[WrapperUtility::getHash($wrapper)];

        WrapperUtility::updateRecenty($wrapper, $recenty);
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineAll(WrapperInterface $wrapper)
    {
        return array_filter($this->rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineContext(WrapperInterface $wrapper)
    {
        return array_filter($this->rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntityType(WrapperInterface $wrapper)
    {
        return array_filter($this->rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext()
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId()
                && $recenty->getEntityId() === $wrapper->getEntityId();
        });
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntity(WrapperInterface $wrapper)
    {
        return array_filter($this->rows, function (RecentyInterface $recenty) use ($wrapper) {
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
        return array_filter($this->rows, function (RecentyInterface $recenty) use ($wrapper) {
            return $recenty->getUserId() === $wrapper->getUserId()
                && $recenty->getContext() === $wrapper->getContext()
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId()
                && $recenty->getEntityId() === $wrapper->getEntityId();
        });
    }
}