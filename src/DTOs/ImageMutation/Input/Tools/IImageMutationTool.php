<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input\Tools;

interface IImageMutationTool
{
    public function getIdentifier() : string;

    public function setIdentifier(string $value);
    
    public function getMutationTool() : string;

    public function setMutationTool(string $value);
}