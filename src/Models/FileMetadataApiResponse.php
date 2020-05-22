<?php

namespace StableCube\FileMuncherClient\Models;

class FileMetadataApiResponse
{
    protected $statusCode;

    protected $fileMetadata;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getData() : ?FileMetadataOutputDTO
    {
        return $this->fileMetadata;
    }

    public function setData(FileMetadataOutputDTO $value)
    {
        $this->fileMetadata = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }
}