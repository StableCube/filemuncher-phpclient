<?php

namespace StableCube\FileMuncherClient\DTOs\Shared\Output;

use StableCube\FileMuncherClient\DTOs\Shared\Output\TaskCreatedOutputDTO;

class TaskBatchCreatedOutputDTO
{
    public $id;
    public $workspaceId;
    public $jobId;
    public $identifier;
    public $tasks;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $workspaceId)
    {
        $this->workspaceId = $workspaceId;
    }

    public function getJobId() : string
    {
        return $this->jobId;
    }

    public function setJobId(string $jobId)
    {
        $this->jobId = $jobId;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function getTasks() : array
    {
        return $this->tasks;
    }

    public function setTasks(array $tasks)
    {
        foreach ($tasks as $value) {
            if (!($value instanceof TaskCreatedOutputDTO)) {
                throw new \Exception("Must be of type " . TaskCreatedOutputDTO::class);
            }
        }

        $this->tasks = $tasks;
    }
}