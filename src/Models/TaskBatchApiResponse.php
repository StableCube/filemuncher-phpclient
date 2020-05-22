<?php

namespace StableCube\FileMuncherClient\Models;

use StableCube\FileMuncherClient\DTOs\Shared\Output\TaskBatchCreatedOutputDTO;

class TaskBatchApiResponse
{
    protected $statusCode;

    protected $taskBatch;

    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $value)
    {
        $this->statusCode = $value;
    }

    public function getData() : ?TaskBatchCreatedOutputDTO
    {
        return $this->taskBatch;
    }

    public function setData(TaskBatchCreatedOutputDTO $value)
    {
        $this->taskBatch = $value;
    }

    public function succeeded() : bool
    {
        if($this->getStatusCode() === 200)
            return true;
        
        return false;
    }
}