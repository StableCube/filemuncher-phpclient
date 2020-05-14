<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\VideoCodec;

abstract class VideoCodecOptionsBaseInputDTO implements IVideoCodecOptionsInputDTO
{
    public $codec;

    public function getCodec() : string
    {
        return $this->codec;
    }

    public function setCodec(string $codec)
    {
        $this->codec = $codec;
    }
}