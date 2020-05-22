<?php

namespace StableCube\FileMuncherClient\Models;

class FileMetadataCollectionApiResponse
{
    protected $statusCode;

    protected $fileMetadataCollection;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getData() : ?array
    {
        return $this->fileMetadataCollection;
    }

    public function setData(array $value)
    {
        $this->fileMetadataCollection = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }
}