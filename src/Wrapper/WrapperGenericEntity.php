<?php

namespace GGGGino\RecentyBundle\Wrapper;

use GGGGino\RecentyBundle\Exception\EntityNotValidException;

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
     * @throws EntityNotValidException
     */
    public function __construct($entity, $context, $userId)
    {
        if (!$entity->getId()) {
            throw new EntityNotValidException("Entity does not exist");
        }

        $this->entity = $entity;
        $this->context = $context;
        $this->userId = $userId;
    }

    /**
     * How object will be serialized
     */
    public function __sleep()
    {
        return array(
            'userId' => $this->getUserId(),
            'context' => $this->getContext(),
            'entityTypeId' => $this->getEntityTypeId(),
            'entityId' => $this->getEntityId()
        );
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