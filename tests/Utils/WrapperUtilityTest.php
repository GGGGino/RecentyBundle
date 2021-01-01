<?php

namespace GGGGino\RecentyBundle\Tests\Utils;

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
        $hashCreated = WrapperUtility::getHash($this->genericWrapper);

        $this->assertEquals('userIdGGGGino\RecentyBundle\Tests\TestSampleEntity2prova', $hashCreated);
    }

    public function testGetHash()
    {
        $hashCreated = WrapperUtility::getHash($this->genericWrapper);

        $this->assertEquals('userIdGGGGino\RecentyBundle\Tests\TestSampleEntity2prova', $hashCreated);
    }

    public function testCreateRecenty()
    {
        $hashCreated = WrapperUtility::getHash($this->genericWrapper);

        $this->assertEquals('userIdGGGGino\RecentyBundle\Tests\TestSampleEntity2prova', $hashCreated);
    }
}
