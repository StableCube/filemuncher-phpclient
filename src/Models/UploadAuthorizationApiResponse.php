<?php

namespace StableCube\FileMuncherClient\Models;

class UploadAuthorizationApiResponse
{
    protected $statusCode;

    protected $uploadAuthorization;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getData() : ?UploadAuthorization
    {
        return $this->uploadAuthorization;
    }

    public function setData(UploadAuthorization $value)
    {
        $this->uploadAuthorization = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }
}