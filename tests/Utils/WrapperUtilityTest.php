<?php

namespace GGGGino\RecentyBundle\Tests\Utils;

use GGGGino\RecentyBundle\Model\Recenty;
use GGGGino\RecentyBundle\Model\RecentyInterface;
use GGGGino\RecentyBundle\Tests\TestSampleEntity;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperGenericEntity;
use GGGGino\RecentyBundle\Wrapper\WrapperInterface;
use PHPUnit\Framework\TestCase;

class WrapperUtilityTest extends TestCase
{
    /**
     * @var WrapperInterface
     */
    private $genericWrapper;

    public function setUp(): void
    {
        $testEntity = new TestSampleEntity();
        $testEntity->setId(2);

        $this->genericWrapper = new WrapperGenericEntity($testEntity, 'prova', 'userId');
    }

    public function testUpdateRecenty()
    {
        $recentyEntity = new Recenty();
        WrapperUtility::updateRecenty($this->genericWrapper, $recentyEntity);

        $this->assertEquals('prova', $recentyEntity->getContext());
        $this->assertEquals(2, $recentyEntity->getEntityId());
        $this->assertEquals(TestSampleEntity::class, $recentyEntity->getEntityTypeId());
    }

    public function testGetHash()
    {
        $hashCreated = WrapperUtility::getHash($this->genericWrapper);

        $this->assertEquals('userIdGGGGino\RecentyBundle\Tests\TestSampleEntity2prova', $hashCreated);
    }

    public function testCreateRecenty()
    {
        /** @var RecentyInterface $recentyEntity */
        $recentyEntity = WrapperUtility::createRecenty($this->genericWrapper);

        $this->assertEquals('prova', $recentyEntity->getContext());
        $this->assertEquals(2, $recentyEntity->getEntityId());
        $this->assertEquals(TestSampleEntity::class, $recentyEntity->getEntityTypeId());
    }
}
