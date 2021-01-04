<?php

namespace GGGGino\RecentyBundle\Storage;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use GGGGino\RecentyBundle\Model\RecentyBase;
use GGGGino\RecentyBundle\Model\RecentyInterface;
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
    public function save(RecentyInterface $recenty)
    {
        $recentyRepo = $this->em->getRepository(RecentyBase::class);

        /** @var RecentyInterface $recenty */
        $recenty = $recentyRepo->findOneBy(array(
            'userId' => $recenty->getUserId(),
            'context' => $recenty->getContext(),
            'entityTypeId' => $recenty->getEntityTypeId(),
            'entityId' => $recenty->getEntityId()
        ));

        if (!$recenty) {
            $this->em->persist($recenty);
        }

        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function retrieveStrict(WrapperInterface $wrapper)
    {
        $recentyRepo = $this->em->getRepository(RecentyBase::class);

        return $recentyRepo->findOneBy(array(
            'userId' => $wrapper->getUserId(),
            'context' => $wrapper->getContext(),
            'entityTypeId' => $wrapper->getEntityTypeId(),
            'entityId' => $wrapper->getEntityId()
        ));
    }

    /**
     * @inheritDoc
     */
    public function retrieveCustom(WrapperInterface $wrapper, $extra)
    {
        /** @var EntityRepository $recentyRepo */
        $recentyRepo = $this->em->getRepository(RecentyBase::class);

        /** @var Criteria $criteria */
        $criteria = Criteria::create();

        if (isset($extra['userId'])) {
            $criteria->andWhere(Criteria::expr()->eq('userId', $extra['userId']));
        }

        if (isset($extra['context'])) {
            $criteria->andWhere(Criteria::expr()->eq('context', $extra['context']));
        }

        if (isset($extra['entityTypeId'])) {
            $criteria->andWhere(Criteria::expr()->eq('entityTypeId', $extra['entityTypeId']));
        }

        if (isset($extra['entityId'])) {
            $criteria->andWhere(Criteria::expr()->eq('entityId', $extra['entityId']));
        }

        if (isset($extra['order'])) {
            $criteria->orderBy(array($extra['order']['field'] => $extra['order']['direction']));
        }

        return $recentyRepo->matching($criteria);
    }
}