<?php

namespace StableCube\FileMuncherClient\Models;

class BackblazeExportFileInput implements \JsonSerializable
{
    protected $sourceFilename;

    protected $destinationFilename;

    protected $destinationBucketId;

    public function jsonSerialize()
    {
        return 
        [
            'sourceFilename'   => $this->getSourceFilename(),
            'destinationFilename' => $this->getDestinationFilename(),
            'destinationBucketId' => $this->getDestinationBucketId()
        ];
    }

    public function getSourceFilename() : string
    {
        return $this->sourceFilename;
    }

    public function setSourceFilename(string $sourceFilename)
    {
        $this->sourceFilename = $sourceFilename;
    }

    public function getDestinationFilename() : string
    {
        return $this->destinationFilename;
    }

    public function setDestinationFilename(string $destinationFilename)
    {
        $this->destinationFilename = $destinationFilename;
    }

    public function getDestinationBucketId() : string
    {
        return $this->destinationBucketId;
    }

    public function setDestinationBucketId(string $destinationBucketId)
    {
        $this->destinationBucketId = $destinationBucketId;
    }
}