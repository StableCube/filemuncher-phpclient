<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\AudioCodec;

abstract class AudioCodecOptionsBaseInputDTO implements IAudioCodecOptionsInputDTO
{
    public $codec;
    public $copyAudioChannelsFromSource;
    public $audioChannels;

    function __construct()
    {
        $this->audioChannels = 0;
        $this->copyAudioChannelsFromSource = false;
    }

    public function getCodec() : string
    {
        return $this->codec;
    }

    public function setCodec(string $codec)
    {
        $this->codec = $codec;
    }

    public function getCopyAudioChannelsFromSource() : bool
    {
        return $this->copyAudioChannelsFromSource;
    }

    public function setCopyAudioChannelsFromSource(bool $value)
    {
        $this->copyAudioChannelsFromSource = $value;
    }

    public function getAudioChannels() : int
    {
        return $this->audioChannels;
    }

    public function setAudioChannels(int $audioChannels)
    {
        $this->audioChannels = $audioChannels;
    }
}