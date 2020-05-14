<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input;

class ResizeInputDTO
{
    public $upscaleBeyondSource;
    public $mode;
    public $width;
    public $height;
    public $fillColor;

    public function getUpscaleBeyondSource() : bool
    {
        return $this->upscaleBeyondSource;
    }

    public function setUpscaleBeyondSource(bool $upscaleBeyondSource)
    {
        $this->upscaleBeyondSource = $upscaleBeyondSource;
    }

    public function getMode() : string
    {
        return $this->mode;
    }

    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }

    public function getWidth() : int
    {
        return $this->width;
    }

    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    public function getHeight() : int
    {
        return $this->height;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    public function getFillColor() : string
    {
        return $this->fillColor;
    }

    public function setFillColor(string $fillColor)
    {
        $this->fillColor = $fillColor;
    }
}