<?php

namespace aliyun\sdk\core\exception;

use Throwable;

/**
 * Class InvalidParameterException.
 */
class InvalidParameterException extends \InvalidArgumentException
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
