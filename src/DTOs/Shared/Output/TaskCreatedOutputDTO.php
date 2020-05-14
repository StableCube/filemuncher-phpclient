<?php

namespace StableCube\FileMuncherClient\DTOs\Shared\Output;

class TaskCreatedOutputDTO
{
    public $id;
    public $batchId;
    public $batchIndex;
    public $metaTags;

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

    public function getMetaTags() : array
    {
        return $this->metaTags;
    }

    public function setMetaTags(array $metaTags)
    {
        $this->metaTags = $metaTags;
    }
}