<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\JsonWebToken;

/**
 * Manages the FileMuncher jwt cache
 */
interface ITokenStorageAdapter
{
    /**
     * Get cache key used to get/set the token in cache
     * 
     * @return string
     */
    public function getCacheKey() : string;

    /**
     * Get token from cache
     * 
     * @param string $cacheKey
     * @return JsonWebToken
     */
    public function getToken() : ?JsonWebToken;

    /**
     * Set token in cache
     * 
     * @param string $cacheKey
     * @param JsonWebToken $token
     * @return void
     */
    public function setToken(JsonWebToken $token): void;
}