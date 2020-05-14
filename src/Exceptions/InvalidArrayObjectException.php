<?php

namespace StableCube\FileMuncherClient\Exceptions;

class InvalidArrayObjectException extends \Exception
{
    public function __construct(string $requiredType, string $actualType)
    {
        parent::__construct("The array object must be of the type {$requiredType} but {$actualType} was given", 500, null);
    }
}