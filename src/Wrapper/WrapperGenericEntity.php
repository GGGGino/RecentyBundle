<?php

namespace GGGGino\RecentyBundle\Wrapper;

/**
 * Class WrapperGenericEntity
 * @package GGGGino\RecentyBundle\Wrapper
 */
class WrapperGenericEntity implements WrapperInterface
{
    /**
     * @var object
     */
    private $entity;

    /**
     * @var string
     */
    private $context;

    /**
     * @var string
     */
    private $userId;

    /**
     * WrapperGenericEntity constructor.
     * @param object $entity
     * @param string $context
     * @param $userId
     */
    public function __construct($entity, $context, $userId)
    {
        $this->entity = $entity;
        $this->context = $context;
        $this->userId = $userId;
    }

    /**
     * @return object
     */
    public function getEntity(): object
    {
        return $this->entity;
    }

    /**
     * @param object $entity
     * @return WrapperGenericEntity
     */
    public function setEntity(object $entity): WrapperGenericEntity
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     * @return WrapperGenericEntity
     */
    public function setContext($context): WrapperGenericEntity
    {
        $this->context = $context;
        return $this;
    }

    public function getEntityTypeId(): string
    {
        $refClass = new \ReflectionObject($this->entity);

        return $refClass->getName();
    }

    public function getEntityId(): string
    {
        return strval($this->entity->getId());
    }

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
}