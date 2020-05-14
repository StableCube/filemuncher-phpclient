<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input;

use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\ResizeInputDTO;

abstract class ImageConfigBase
{
    public $identifier;
    public $format;
    public $resize;

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getFormat() : string
    {
        return $this->format;
    }

    public function setFormat(string $format)
    {
        $this->format = $format;
    }

    public function getResize() : ResizeInputDTO
    {
        return $this->resize;
    }

    public function setResize(ResizeInputDTO $resize)
    {
        $this->resize = $resize;
    }
}