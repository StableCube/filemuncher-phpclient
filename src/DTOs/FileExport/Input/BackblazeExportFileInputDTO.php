<?php

namespace StableCube\FileMuncherClient\DTOs\FileExport\Input;

class BackblazeExportFileInputDTO
{
    public $sourceFilename;
    public $destinationFilename;
    public $destinationBucketId;

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