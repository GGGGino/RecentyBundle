<?php

namespace GGGGino\RecentyBundle\Model;

class Recenty extends RecentyBase
{
    public function __construct()
    {
        $this->count = 1;
        $this->lastUpdate = new \DateTime();
    }
}