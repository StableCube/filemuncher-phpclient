<?php

namespace StableCube\FileMuncherClient\Exceptions;

class HttpImportFailedException extends \Exception
{
    public function __construct(string $message, $errorNo)
    {
        parent::__construct($message, $errorNo, null);
    }
}