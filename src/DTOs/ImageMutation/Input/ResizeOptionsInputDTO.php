<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input;

class ResizeOptionsInputDTO
{
    public $upscaleBeyondSource;
    public $resizeMode;
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

    public function getResizeMode() : string
    {
        return $this->resizeMode;
    }

    public function setResizeMode(string $resizeMode)
    {
        $this->resizeMode = $resizeMode;
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