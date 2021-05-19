<?php

namespace StableCube\FileMuncherClient\DTOs\Shared\Output;

class TaskCreatedOutputDTO
{
    public $id;
    public $batchId;
    public $batchIndex;
    public $identifier;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getBatchId() : string
    {
        return $this->batchId;
    }

    public function setBatchId(string $batchId)
    {
        $this->batchId = $batchId;
    }

    public function getBatchIndex() : int
    {
        return $this->batchIndex;
    }

    public function setBatchIndex(int $batchIndex)
    {
        $this->batchIndex = $batchIndex;
    }

    public function getIdentifier() : string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier)
    {
        $this->identifier = $identifier;
    }
}