<?php

namespace GGGGino\RecentyBundle\Wrapper;

/**
 * Interface WrapperInterface
 * @package GGGGino\RecentyBundle\Wrapper
 */
interface WrapperInterface
{
    public function getEntityTypeId(): string;

    public function getEntityId(): string;

    public function getContext(): string;

    public function getUserId(): string;

    public function __sleep();
}