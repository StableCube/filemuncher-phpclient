<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\AudioCodec;

interface IAudioCodecOptionsInputDTO
{
    public function getCodec() : string;

    public function setCodec(string $value);

    public function getCopyAudioChannelsFromSource() : bool;

    public function setCopyAudioChannelsFromSource(bool $value);

    public function getAudioChannels() : int;

    public function setAudioChannels(int $value);
}