<?php

namespace StableCube\FileMuncherClient\DTOs\FileExport\Input;

use StableCube\FileMuncherClient\DTOs\FileExport\Input\BackblazeExportFileInputDTO;

class BackblazeExportInputDTO
{
    public $workspaceId;
    public $keyId;
    public $applicationKey;
    public $files;

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $workspaceId)
    {
        $this->workspaceId = $workspaceId;
    }
    
    public function getKeyId() : string
    {
        return $this->keyId;
    }

    public function setKeyId(string $keyId)
    {
        $this->keyId = $keyId;
    }

    public function getApplicationKey() : string
    {
        return $this->applicationKey;
    }

    public function setApplicationKey(string $applicationKey)
    {
        $this->applicationKey = $applicationKey;
    }

    public function getFiles() : array
    {
        return $this->files;
    }

    public function setFiles(array $files)
    {
        foreach ($files as $value) {
            if (!($value instanceof BackblazeExportFileInputDTO)) {
                throw new \Exception("Must be of type " . BackblazeExportFileInputDTO::class);
            }
        }

        $this->files = $files;
    }
}