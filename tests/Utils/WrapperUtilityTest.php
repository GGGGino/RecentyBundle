<?php

namespace GGGGino\RecentyBundle\Tests\Utils;

use GGGGino\RecentyBundle\Tests\TestSampleEntity;
use GGGGino\RecentyBundle\Utils\WrapperUtility;
use GGGGino\RecentyBundle\Wrapper\WrapperGenericEntity;
use PHPUnit\Framework\TestCase;

class WrapperUtilityTest extends TestCase
{
    public function testUpdateRecenty()
    {

    }

    public function testGetHash()
    {
        $testEntity = new TestSampleEntity();
        $testEntity->setId(2);

        $wrapper = new WrapperGenericEntity($testEntity, 'prova');
        $wrapper->setUserId('ciao');

        $hashCreated = WrapperUtility::getHash($wrapper);

        $this->assertEquals('ciaoGGGGino\RecentyBundle\Tests\TestSampleEntity2prova', $hashCreated);
    }

    public function testCreateRecenty()
    {

    }
}