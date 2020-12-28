<?php

namespace GGGGino\RecentyBundle\Strategy;

use GGGGino\RecentyBundle\Storage\StorageInterface;
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
     * @param WrapperInterface $wrapper
     */
    public function increment(WrapperInterface $wrapper)
    {
        // TODO: Implement increment() method.
    }

    /**
     * @param WrapperInterface $wrapper
     */
    public function decrement(WrapperInterface $wrapper)
    {
        // TODO: Implement decrement() method.
    }
}