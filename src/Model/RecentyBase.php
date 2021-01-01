<?php

namespace GGGGino\RecentyBundle\Model;

/**
 * Class RecentyBase
 * @package GGGGino\RecentyBundle\Model
 */
abstract class RecentyBase implements RecentyInterface
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $entityTypeId;

    /**
     * @var string
     */
    protected $entityId;

    /**
     * @var string
     */
    protected $context;

    /**
     * @var integer
     */
    protected $count;

    /**
     * @var \DateTime
     */
    protected $lastUpdate;

    public function __construct()
    {
        $this->count = 1;
        $this->lastUpdate = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getEntityTypeId(): string
    {
        return $this->entityTypeId;
    }

    /**
     * @param string $entityTypeId
     */
    public function setEntityTypeId(string $entityTypeId): void
    {
        $this->entityTypeId = $entityTypeId;
    }

    /**
     * @return string
     */
    public function getEntityId(): string
    {
        return $this->entityId;
    }

    /**
     * @param string $entityId
     */
    public function setEntityId(string $entityId): void
    {
        $this->entityId = $entityId;
    }

    /**
     * @return string
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    /**
     * @param \DateTime $lastUpdate
     */
    public function setLastUpdate(\DateTime $lastUpdate): void
    {
        $this->lastUpdate = $lastUpdate;
    }
}