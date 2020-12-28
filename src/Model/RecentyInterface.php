<?php

namespace GGGGino\RecentyBundle\Model;

/**
 * Class RecentyInterface
 * @package GGGGino\RecentyBundle\Model
 */
interface RecentyInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getUserId(): string;

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void;

    /**
     * @return string
     */
    public function getEntityTypeId(): string;

    /**
     * @param string $entityTypeId
     */
    public function setEntityTypeId(string $entityTypeId): void;

    /**
     * @return string
     */
    public function getEntityId(): string;

    /**
     * @param string $entityId
     */
    public function setEntityId(string $entityId): void;

    /**
     * @return string
     */
    public function getContext(): string;

    /**
     * @param string $context
     */
    public function setContext(string $context): void;

    /**
     * @return int
     */
    public function getCount(): int;

    /**
     * @param int $count
     */
    public function setCount(int $count): void;

    /**
     * @return \DateTime
     */
    public function getLastUpdate(): \DateTime;

    /**
     * @param \DateTime $lastUpdate
     */
    public function setLastUpdate(\DateTime $lastUpdate): void;
}