<?php

namespace GGGGino\RecentyBundle;

use GGGGino\RecentyBundle\Strategy\StrategyInterface;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

class WrapperManager
{
    /**
     * @var StrategyInterface
     */
    private $strategy;

    /**
     * WrapperManager constructor.
     * @param StrategyInterface $strategy
     */
    public function __construct(StrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    public function increment(WrapperInterface $wrapper)
    {
        $this->strategy->increment($wrapper, 'userId');
    }
}