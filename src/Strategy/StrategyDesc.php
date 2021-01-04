<?php

namespace GGGGino\RecentyBundle\Strategy;

use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Storage\StorageInterface;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Class StrategyDesc
 * @package GGGGino\RecentyBundle\Strategy
 */
class StrategyDesc implements StrategyInterface
{
    /**
     * @var StorageInterface
     */
    private $storage;

    /**
     * StrategyDesc constructor.
     * @param StorageInterface $storage
     */
    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function increment(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $recenties */
        $recenties = $this->retrieveStrict($wrapper);

        if (empty($recenties)) {
            $recenties = array(WrapperUtility::createRecenty($wrapper));
        }

        foreach ($recenties as $recenty) {
            $recenty->setCount($recenty->getCount() + 1);
            $recenty->setLastUpdate(new \DateTime());

            $this->storage->save($recenty);
        }
    }

    /**
     * @inheritDoc
     */
    public function decrement(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $recenties */
        $recenties = $this->retrieveStrict($wrapper);

        if (empty($recenties)) {
            $recenties = array(WrapperUtility::createRecenty($wrapper));
        }

        foreach ($recenties as $recenty) {
            if ($recenty->getCount() > 0) {
                $recenty->setCount($recenty->getCount() - 1);
                $this->storage->save($recenty);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function retrieveStrict(WrapperInterface $wrapper)
    {
        /** @var RecentyInterface[] $recenties */
        $recenties = $this->storage->retrieveCustom($wrapper, $this->getParameters($wrapper));

        usort($recenties, function(RecentyInterface $recentyA, RecentyInterface $recentyB) {
            if ($recentyA->getCount() === $recentyB->getCount()) { return 0; }

            return $recentyA > $recentyB ? -1 : 1;
        });
    }

    public function getParameters(WrapperInterface $wrapper)
    {
        return array(
            'userId' => $wrapper->getUserId(),
            'context' => $wrapper->getContext(),
            'entityTypeId' => $wrapper->getEntityTypeId(),
            'order' => array(
                'field' => 'count',
                'direction' => 'ASC'
            )
        );
    }
}