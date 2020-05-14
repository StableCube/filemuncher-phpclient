<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\AudioCodec;

class AACAudioCodecOptionsInputDTO extends AudioCodecOptionsBaseInputDTO
{
    function __construct()
    {
        $this->setCodec('Aac');
    }
}