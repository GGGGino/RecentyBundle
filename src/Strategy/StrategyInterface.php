<?php

namespace GGGGino\RecentyBundle\Strategy;

use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Interface used for establish the logic to retrieve and save the row
 *
 * Interface StrategyInterface
 * @package GGGGino\RecentyBundle\Strategy
 */
interface StrategyInterface
{
    /**
     * @param WrapperInterface $wrapper
     */
    public function increment(WrapperInterface $wrapper);

    /**
     * @param WrapperInterface $wrapper
     */
    public function decrement(WrapperInterface $wrapper);
}