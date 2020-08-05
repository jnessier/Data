<?php


namespace Neoflow\Data\Exception;

use Exception;

class InvalidDataException extends Exception
{
    protected $message = 'Data is not an array or an ArrayAccess-implementation.';
}
