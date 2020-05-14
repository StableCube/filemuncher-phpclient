<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\VideoCodec;

interface IVideoCodecOptionsInputDTO
{
    public function getCodec() : string;

    public function setCodec(string $identifier);
}