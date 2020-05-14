<?php

namespace StableCube\FileMuncherClient\Exceptions;

class DownloadFailedException extends \Exception
{
    public function __construct(string $url, string $error)
    {
        parent::__construct("The download of {$url} failed with: {$error}", 500, null);
    }
}