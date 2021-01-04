<?php

namespace GGGGino\RecentyBundle\Exception;

use Throwable;

/**
 * Class EntityNotValidException
 * @package GGGGino\RecentyBundle\Exception
 */
class EntityNotValidException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}