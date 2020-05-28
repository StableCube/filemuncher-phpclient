<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\Models\JsonWebToken;

class AuthenticationEndpointV1 extends EndpointBase
{
    function __construct(
        OAuthTokenManager $tokenManager,
        bool $disableCertValidation = false)
    {
        parent::__construct($tokenManager, $disableCertValidation);
    }

    /**
     * Generates a JWT for frontend access
     *
     * @param array $scopes Granted scopes for the JWT
     * @return \StableCube\FileMuncherClient\Models\JsonWebToken
     */
    public function getJsonWebToken(array $scopes) : JsonWebToken
    {
        return $this->getOauthTokenManager()->getJWT($scopes);
    }
}
