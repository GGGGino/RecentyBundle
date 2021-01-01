<?php

namespace GGGGino\RecentyBundle\Tests;

/**
 * Used as common database entity
 *
 * Class TestSampleEntity
 * @package GGGGino\RecentyBundle\Tests
 */
class TestSampleEntity
{
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}