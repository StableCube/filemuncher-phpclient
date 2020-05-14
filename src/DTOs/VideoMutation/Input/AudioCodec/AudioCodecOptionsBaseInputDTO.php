<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\AudioCodec;

abstract class AudioCodecOptionsBaseInputDTO implements IAudioCodecOptionsInputDTO
{
    public $codec;
    public $copyAudioChannelsFromSource;
    public $audioChannels;

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

    public function setCopyAudioChannelsFromSource(bool $copyAudioChannelsFromSource)
    {
        $this->copyAudioChannelsFromSource = $copyAudioChannelsFromSource;
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