<?php

namespace StableCube\FileMuncherClient\Models;

class JsonWebToken implements \JsonSerializable
{
    public $accessToken;
    public $expiresIn;
    public $tokenType;
    
    function __construct()
    {
    }

    public function fromArray(array $data)
    {
        $this->accessToken = $data['access_token'];
        $this->expiresIn = $data['expires_in'];
        $this->tokenType = $data['token_type'];
    }

    public function getDecodedToken($clientSecret = null)
    {
        return \JWT::decode($this->accessToken, $clientSecret);
    }

    public function getIsExpired() : bool
    {
        $decodedToken = $this->getDecodedToken();

        return (($decodedToken->exp - 120) < time());
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