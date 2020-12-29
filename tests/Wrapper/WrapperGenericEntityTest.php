<?php

namespace GGGGino\RecentyBundle\Tests\Wrapper;

use GGGGino\RecentyBundle\Tests\TestSampleEntity;
use GGGGino\RecentyBundle\Wrapper\WrapperGenericEntity;
use PHPUnit\Framework\TestCase;

class WrapperGenericEntityTest extends TestCase
{
    public function testCanParseEntity(): void
    {
        $testEntity = new TestSampleEntity();

        $wrapper = new WrapperGenericEntity($testEntity, 'prova');

        $this->assertEquals('prova', $wrapper->getContext());
    }
}
