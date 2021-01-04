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

    public function __construct()
    {
        $this->rows = array();
    }

    /**
     * @inheritDoc
     */
    public function save(RecentyInterface $recenty)
    {
        $this->rows[WrapperUtility::getHash($recenty)] = $recenty;
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
                && $recenty->getEntityTypeId() === $wrapper->getEntityTypeId();
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
        $rowsFiltered = array_filter($this->rows, function (RecentyInterface $recenty) use ($wrapper) {
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
        return array_filter($this->rows, function (RecentyInterface $recenty) use ($extra) {
            if (isset($extra['userId']) && $recenty->getUserId() !== $extra['userId']) { return false; }

            if (isset($extra['context']) && $recenty->getContext() !== $extra['context']) { return false; }

            if (isset($extra['entityTypeId']) && $recenty->getEntityTypeId() !== $extra['entityTypeId']) { return false; }

            if (isset($extra['entityId']) && $recenty->getEntityId() !== $extra['entityId']) { return false; }

            return true;
        });
    }
}