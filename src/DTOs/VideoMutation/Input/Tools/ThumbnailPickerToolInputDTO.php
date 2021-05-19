<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\Tools;

use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\ImageFormatInputDTO;

class ThumbnailPickerToolInputDTO extends MutationToolBase
{
    public $sourceFilename;
    public $outputProfiles;

    function __construct()
    {
        $this->setMutationTool('ThumbnailPickerPreviewGen');
    }

    public function getSourceFilename() : string
    {
        return $this->sourceFilename;
    }

    public function setSourceFilename(string $sourceFilename)
    {
        $this->sourceFilename = $sourceFilename;
    }
    
    public function getOutputProfiles() : array
    {
        return $this->outputProfiles;
    }

    public function setOutputProfiles(array $outputProfiles)
    {
        foreach ($outputProfiles as $value) {
            if (!($value instanceof ImageFormatInputDTO)) {
                throw new \Exception("Must be of type " . ImageFormatInputDTO::class);
            }
        }

        $this->outputProfiles = $outputProfiles;
    }
}