<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\JsonWebToken;

/**
 * Manages the FileMuncher jwt cache
 */
abstract class TokenStorageAdapterBase implements ITokenStorageAdapter
{
    public abstract function getCacheKey() : string;

    public abstract function getToken() : ?JsonWebToken;

    public abstract function setToken(JsonWebToken $token): void;
}