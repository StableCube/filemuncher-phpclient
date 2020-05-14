<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input;

use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\ProcessProfileFrameExtractOutput;

class FrameExtractionInputDTO
{
    public $mode;
    public $value;
    public $outputProfiles;

    public function getMode() : string
    {
        return $this->mode;
    }

    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }
    
    public function getValue() : string
    {
        return $this->value;
    }

    public function setValue(string $value)
    {
        $this->value = $value;
    }

    public function getOutputProfiles() : array
    {
        return $this->outputProfiles;
    }

    public function setOutputProfiles(array $outputProfiles)
    {
        foreach ($outputProfiles as $value) {
            if (!($value instanceof ProcessProfileFrameExtractOutput)) {
                throw new \Exception("Must be of type " . ProcessProfileFrameExtractOutput::class);
            }
        }

        $this->outputProfiles = $outputProfiles;
    }
}