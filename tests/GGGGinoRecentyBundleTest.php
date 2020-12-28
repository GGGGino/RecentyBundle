<?php

namespace GGGGino\RecentyBundle\Tests;

use GGGGino\RecentyBundle\GGGGinoRecentyBundle;
use PHPUnit\Framework\TestCase;

class GGGGinoRecentyBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new GGGGinoRecentyBundle();

        $this->assertInstanceOf('GGGGino\RecentyBundle\GGGGinoRecentyBundle', $bundle);
    }
}
