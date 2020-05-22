<?php

namespace StableCube\FileMuncherClient\Models;

class JsonWebToken implements \JsonSerializable
{
    private $accessToken;
    private $expiresIn;
    private $tokenType;
    
    function __construct()
    {
    }

    public function fromArray(array $data)
    {
        $this->accessToken = $data['access_token'];
        $this->expiresIn = $data['expires_in'];
        $this->tokenType = $data['token_type'];
    }

    public function getExpiresIn() : int
    {
        return $this->expiresIn;
    }

    public function getIsExpired() : bool
    {
        return (($this->getExpiresIn() - 120) < time());
    }

    public function getTokenType() : string
    {
        return $this->tokenType;
    }

    public function getAccessToken() : string
    {
        return $this->accessToken;
    }

    public function jsonSerialize() : array
    {
        return [
            'accessToken' => $this->accessToken, 
            'expiresIn' => $this->expiresIn,
            'tokenType' => $this->tokenType
        ];
    }
}