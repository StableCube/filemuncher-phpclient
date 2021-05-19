<?php

namespace StableCube\FileMuncherClient\Models;

class ApiResponse
{
    protected $statusCode;

    protected $responseData;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getResponseData() : string
    {
        return $this->responseData;
    }

    public function setResponseData(string $value)
    {
        $this->responseData = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }

    public function getResponseJson() : object
    {
        return json_decode($this->getResponseData());
    }

    public function getResponseJsonArray() : array
    {
        return json_decode($this->getResponseData(), true);
    }
}