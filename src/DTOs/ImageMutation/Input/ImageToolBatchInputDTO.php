<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input;

use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\Tools\IImageMutationTool;

class ImageToolBatchInputDTO
{
    public $workspaceSessionId;
    public $identifier;
    public $tools;

    public function getWorkspaceSessionId() : string
    {
        return $this->workspaceSessionId;
    }

    public function setWorkspaceSessionId(string $workspaceSessionId)
    {
        $this->workspaceSessionId = $workspaceSessionId;
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