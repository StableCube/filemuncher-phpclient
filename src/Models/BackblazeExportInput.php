<?php

namespace StableCube\FileMuncherClient\Models;

class BackblazeExportInput implements \JsonSerializable
{
    protected $keyId;

    protected $applicationKey;

    protected $files;

    public function jsonSerialize()
    {
        return 
        [
            'keyId'   => $this->getKeyId(),
            'applicationKey' => $this->getApplicationKey(),
            'files' => $this->getFiles()
        ];
    }

    public function getKeyId() : string
    {
        return $this->keyId;
    }

    public function setKeyId(string $keyId)
    {
        $this->keyId = $keyId;
    }

    public function getApplicationKey() : string
    {
        return $this->applicationKey;
    }

    public function setApplicationKey(string $applicationKey)
    {
        $this->applicationKey = $applicationKey;
    }

    public function getFiles() : array
    {
        return $this->files;
    }

    public function setFiles(array $files)
    {
        $this->files = $files;
    }

    public function addFile(BackblazeExportFileInput $file)
    {
        $this->files[] = $file;
    }
}