<?php

namespace StableCube\FileMuncherClient\Models;

class ExportId
{
    protected $exportId;

    protected $workspaceId;

    public function getExportId() : string
    {
        return $this->exportId;
    }

    public function setExportId(string $exportId)
    {
        $this->exportId = $exportId;
    }

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $workspaceId)
    {
        $this->workspaceId = $workspaceId;
    }
}