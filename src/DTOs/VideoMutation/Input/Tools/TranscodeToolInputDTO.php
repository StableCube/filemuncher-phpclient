<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\Tools;

use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\AudioCodec\IAudioCodecOptionsInputDTO;
use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\VideoCodec\IVideoCodecOptionsInputDTO;
use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\ResizeInputDTO;

class TranscodeToolInputDTO extends MutationToolBase
{
    public $sourceFilename;
    public $container;
    public $audioCodecOptions;
    public $videoCodecOptions;
    public $resize;

    function __construct()
    {
        $this->setMutationTool('Transcode');
    }

    public function getSourceFilename() : string
    {
        return $this->sourceFilename;
    }

    public function setSourceFilename(string $sourceFilename)
    {
        $this->sourceFilename = $sourceFilename;
    }
    
    public function getContainer() : string
    {
        return $this->container;
    }

    public function setContainer(string $container)
    {
        $this->container = $container;
    }

    public function getAudioCodecOptions() : IAudioCodecOptionsInputDTO
    {
        return $this->audioCodecOptions;
    }

    public function setAudioCodecOptions(IAudioCodecOptionsInputDTO $audioCodecOptions)
    {
        $this->audioCodecOptions = $audioCodecOptions;
    }

    public function getVideoCodecOptions() : IVideoCodecOptionsInputDTO
    {
        return $this->videoCodecOptions;
    }

    public function setVideoCodecOptions(IVideoCodecOptionsInputDTO $videoCodecOptions)
    {
        $this->videoCodecOptions = $videoCodecOptions;
    }

    public function getResize() : ResizeInputDTO
    {
        return $this->resize;
    }

    public function setResize(ResizeInputDTO $resize)
    {
        $this->resize = $resize;
    }
}