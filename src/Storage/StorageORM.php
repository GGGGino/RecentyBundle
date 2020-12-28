<?php

namespace GGGGino\RecentyBundle\Storage;

use Doctrine\ORM\EntityManagerInterface;
use GGGGino\RecentyBundle\Model\RecentyBase;
use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;

/**
 * Class StorageORM
 * @package GGGGino\RecentyBundle\Storage
 */
class StorageORM implements StorageInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @inheritDoc
     */
    public function save(WrapperInterface $wrapper)
    {
        $recentyRepo = $this->em->getRepository(RecentyBase::class);

        /** @var RecentyInterface $recenty */
        $recenty = $recentyRepo->findOneBy(array(
            'userId' => $wrapper->getUserId(),
            'context' => $wrapper->getContext(),
            'entityTypeId' => $wrapper->getEntityTypeId(),
            'entityId' => $wrapper->getEntityId()
        ));

        if ($recenty) {
            WrapperUtility::updateRecenty($wrapper, $recenty);
        } else {
            $recenty = WrapperUtility::createRecenty($wrapper);
            $this->em->persist($recenty);
        }

        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineAll(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineAll() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineContext(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineContext() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntityType(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineEntityType() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveMineEntity(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveMineEntity() method.
    }

    /**
     * @inheritDoc
     */
    public function retrieveStrict(WrapperInterface $wrapper)
    {
        // TODO: Implement retrieveStrict() method.
    }
}