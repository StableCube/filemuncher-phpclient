<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input;

use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\Tools\IVideoMutationTool;

class VideoToolBatchInputDTO
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
            if (!($value instanceof IVideoMutationTool)) {
                throw new \Exception("Must be of type " . IVideoMutationTool::class);
            }
        }

        $this->tools = $tools;
    }
}