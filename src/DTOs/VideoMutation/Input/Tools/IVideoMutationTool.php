<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\Tools;

interface IVideoMutationTool
{
    public function getIdentifier() : string;

    public function setIdentifier(string $value);
    
    public function getMutationTool() : string;

    public function setMutationTool(string $value);
}