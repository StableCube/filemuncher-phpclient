<?php

namespace StableCube\FileMuncherClient\DTOs\FileExport\Input;

class ExportInputDTO
{
    public $workspaceId;
    public $identifier;
    public $backblaze;

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

    public function getBackblaze() : BackblazeExportInputDTO
    {
        return $this->backblaze;
    }

    public function setBackblaze(BackblazeExportInputDTO $backblaze)
    {
        $this->backblaze = $backblaze;
    }
}