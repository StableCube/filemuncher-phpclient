<?php

namespace StableCube\FileMuncherClient\Models;

class WorkspaceApiResponse
{
    protected $statusCode;

    protected $workspace;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getData() : ?Workspace
    {
        return $this->workspace;
    }

    public function setData(Workspace $value)
    {
        $this->workspace = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }
}