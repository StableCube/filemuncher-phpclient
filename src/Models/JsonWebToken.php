<?php

namespace StableCube\FileMuncherClient\Models;

class JsonWebToken implements \JsonSerializable
{
    private $accessToken;
    private $refreshToken;
    private $expiresIn;
    private $tokenType;
    private $scopes;
    private $creationDate;
    
    public function fromArray(array $data)
    {
        $this->accessToken = $data['access_token'];
        $this->expiresIn = $data['expires_in'];
        $this->tokenType = $data['token_type'];
        $this->scopes = explode(' ', $data['scope']);
        $this->creationDate = new \DateTime("now", new \DateTimeZone("UTC"));

        if(array_key_exists('refresh_token', $data)) {
            $this->refreshToken = $data['refresh_token'];
        }
    }

    /**
     * DateTime the token was created
     *
     * @return \DateTime
     */
    public function getCreationDate() : \DateTime
    {
        return $this->creationDate;
    }

    /**
     * Gets seconds from the time of creation that the token will expire
     *
     * @return integer
     */
    public function getExpiresIn() : int
    {
        return $this->expiresIn;
    }

    /**
     * Returns true if the token is expired
     *
     * @return boolean
     */
    public function getIsExpired() : bool
    {
        $now = new \DateTime("now", new \DateTimeZone("UTC"));
        $expireTime = $this->getCreationDate()>add(new DateInterval("PT{$this->getExpiresIn()}S"));

        return ($now > $expireTime);
    }

    /**
     * The type of token this is, typically just the string “bearer”
     *
     * @return string
     */
    public function getTokenType() : string
    {
        return $this->tokenType;
    }

    /**
     * Scopes this token has been granted
     *
     * @return array
     */
    public function getScopes() : array
    {
        return $this->scopes;
    }

    /**
     * The access token string as issued by the authorization server
     *
     * @return string
     */
    public function getAccessToken() : string
    {
        return $this->accessToken;
    }

    /**
     * Refresh token. Depending on how the token was created it may not be set.
     *
     * @return string|null
     */
    public function getRefreshToken() : ?string
    {
        return $this->refreshToken;
    }

    public function jsonSerialize() : array
    {
        return [
            'accessToken' => $this->accessToken, 
            'expiresIn' => $this->expiresIn,
            'tokenType' => $this->tokenType,
            'scopes' => $this->scopes,
            'creationDate' => $this->creationDate
        ];
    }
}