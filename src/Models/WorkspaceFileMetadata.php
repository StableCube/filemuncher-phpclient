<?php

namespace StableCube\FileMuncherClient\Models;

class WorkspaceFileMetadata
{
    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getFilename() : string
    {
        return $this->filename;
    }

    public function setFilename(string $filename)
    {
        $this->filename = $filename;
    }

    public function getPublicPath() : string
    {
        return $this->publicPath;
    }

    public function setPublicPath(string $publicPath)
    {
        $this->publicPath = $publicPath;
    }
}