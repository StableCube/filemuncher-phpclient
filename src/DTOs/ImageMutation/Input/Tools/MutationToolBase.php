<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input\Tools;

abstract class MutationToolBase implements IImageMutationTool
{
    public $identifier;
    public $mutationTool;

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }
    
    public function getMutationTool() : string
    {
        return $this->mutationTool;
    }

    public function setMutationTool(string $mutationTool)
    {
        $this->mutationTool = $mutationTool;
    }
}