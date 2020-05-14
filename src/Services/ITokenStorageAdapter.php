<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\JsonWebToken;

/**
 * Manages the FileMuncher jwt cache
 */
interface ITokenStorageAdapter
{
    /**
     * Get token from cache
     * 
     * @return JsonWebToken
     */
    public function getToken() : ?JsonWebToken;

    /**
     * Set token in cache
     * 
     * @param JsonWebToken $token
     * @return void
     */
    public function setToken(JsonWebToken $token): void;
}