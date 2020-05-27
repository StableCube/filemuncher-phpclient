<?php

namespace StableCube\FileMuncherClient\DTOs\Shared\Output;

class FileMetadataOutputDTO
{
    public $workspaceId;
    public $tags;
    public $directory;
    public $filename;

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $value)
    {
        $this->workspaceId = $value;
    }

    public function getTags() : object
    {
        return $this->tags;
    }

    public function setTags(object $value)
    {
        $this->tags = $value;
    }

    public function getDirectory() : string
    {
        return $this->directory;
    }

    public function setDirectory(string $value)
    {
        $this->directory = $value;
    }

    public function getFilename() : string
    {
        return $this->filename;
    }

    public function setFilename(string $value)
    {
        $this->filename = $value;
    }
}