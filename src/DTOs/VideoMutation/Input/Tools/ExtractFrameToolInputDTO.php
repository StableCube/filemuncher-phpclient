<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\Tools;

use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\ImageFormatInputDTO;

class ExtractFrameToolInputDTO extends MutationToolBase
{
    public $sourceFilename;
    public $timeMilliseconds;
    public $outputFormat;

    function __construct()
    {
        $this->setMutationTool('ExtractFrame');
        $this->timeMilliseconds = 0;
    }

    public function getSourceFilename() : string
    {
        return $this->sourceFilename;
    }

    public function setSourceFilename(string $sourceFilename)
    {
        $this->sourceFilename = $sourceFilename;
    }

    public function getTimeMilliseconds() : int
    {
        return $this->timeMilliseconds;
    }

    public function setTimeMilliseconds(int $value)
    {
        $this->timeMilliseconds = $value;
    }

    public function getOutputFormat() : ImageFormatInputDTO
    {
        return $this->outputFormat;
    }

    public function setOutputFormat(ImageFormatInputDTO $value)
    {
        $this->outputFormat = $value;
    }
}