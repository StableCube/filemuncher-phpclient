<?php

namespace StableCube\FileMuncherClient\Exceptions;

class FileMuncherHttpException extends \Exception
{
    public function __construct(string $message, $errorNo = 400)
    {
        parent::__construct($message, $errorNo, null);
    }
}