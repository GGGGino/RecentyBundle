<?php

namespace GGGGino\RecentyBundle;

use GGGGino\RecentyBundle\Strategy\StrategyInterface;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Class WrapperManager
 * @package GGGGino\RecentyBundle
 */
class WrapperManager
{
    /**
     * @var StrategyInterface[]
     */
    private $strategies;

    /**
     * @param string $name
     * @param StrategyInterface $strategy
     */
    public function addStrategy(string $name, StrategyInterface $strategy)
    {
        $this->strategies[$name] = $strategy;
    }

    /**
     * @return StrategyInterface[]
     */
    public function getStrategies(): array
    {
        return $this->strategies;
    }

    public function increment(string $name, WrapperInterface $wrapper)
    {
        if (!isset($this->strategies[$name])) { return; }

        $this->strategies[$name]->increment($wrapper);
    }
}