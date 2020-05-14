<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\JsonWebToken;


/**
 * Manages the FileMuncher jwt cache
 */
abstract class TokenStorageAdapterBase implements ITokenStorageAdapter
{
    /**
     * Get token from cache
     * 
     * @return JsonWebToken
     */
    public abstract function getToken() : ?JsonWebToken;

    /**
     * Set token in cache
     * 
     * @param JsonWebToken $token
     * @return void
     */
    public abstract function setToken(JsonWebToken $token): void;
}