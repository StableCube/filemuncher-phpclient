<?php

namespace StableCube\FileMuncherClient\Exceptions;

class DestinationNotWriteableException extends \Exception
{
    public function __construct(string $path)
    {
        parent::__construct("The import destination path {$path} is not writeable", 400, null);
    }
}