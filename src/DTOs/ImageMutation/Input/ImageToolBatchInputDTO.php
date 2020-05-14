<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input;

use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\Tools\IImageMutationTool;

class ImageToolBatchInputDTO
{
    public $workspaceId;
    public $identifier;
    public $tools;

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $workspaceId)
    {
        $this->workspaceId = $workspaceId;
    }
    
    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getTools() : array
    {
        return $this->tools;
    }

    public function setTools(array $tools)
    {
        foreach ($tools as $value) {
            if (!($value instanceof IImageMutationTool)) {
                throw new \Exception("Must be of type " . IImageMutationTool::class);
            }
        }

        $this->tools = $tools;
    }
}