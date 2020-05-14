<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input\OutputFormats;

class PngFormatOptionsInputDTO
{
    public $replaceTransparencyColor;

    public function getReplaceTransparencyColor() : string
    {
        return $this->replaceTransparencyColor;
    }

    public function setReplaceTransparencyColor(string $replaceTransparencyColor)
    {
        $this->replaceTransparencyColor = $replaceTransparencyColor;
    }
}