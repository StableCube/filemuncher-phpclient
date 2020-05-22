<?php

namespace StableCube\FileMuncherClient\Models;

class WorkspaceSessionApiResponse
{
    protected $statusCode;

    protected $workspaceSession;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getData() : ?WorkspaceSession
    {
        return $this->workspaceSession;
    }

    public function setData(WorkspaceSession $value)
    {
        $this->workspaceSession = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }
}