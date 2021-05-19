<?php

namespace StableCube\FileMuncherClient\DTOs\FileExport\Input;

class ExportInputDTO
{
    public $workspaceSessionId;
    public $identifier;
    public $backblaze;

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

    public function getBackblaze() : BackblazeExportInputDTO
    {
        return $this->backblaze;
    }

    public function setBackblaze(BackblazeExportInputDTO $backblaze)
    {
        $this->backblaze = $backblaze;
    }
}