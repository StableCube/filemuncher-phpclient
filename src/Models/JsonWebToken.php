<?php

namespace StableCube\FileMuncherClient\Models;

class JsonWebToken implements \JsonSerializable
{
    public $accessToken;
    public $expiresIn;
    public $tokenType;
    public $clientSecret;
    
    function __construct(string $clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    public function fromArray(array $data)
    {
        $this->accessToken = $data['access_token'];
        $this->expiresIn = $data['expires_in'];
        $this->tokenType = $data['token_type'];
    }

    public function getDecodedToken()
    {
        return \JWT::decode($this->accessToken, $this->clientSecret);
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