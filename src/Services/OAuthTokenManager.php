<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\JsonWebToken;
use StableCube\FileMuncherClient\Services\ITokenStorageAdapter;
use StableCube\FileMuncherClient\Exceptions\FileMuncherHttpException;

class OAuthTokenManager
{
    private $tokenEndpoint;
    private $filemuncherClientId;
    private $filemuncherClientSecret;
    private $backendScopes;
    private $tokenStorageAdapter;

    function __construct(
        ITokenStorageAdapter $tokenStorageAdapter,
        string $tokenEndpoint,
        string $filemuncherClientId,
        string $filemuncherClientSecret,
        array $backendScopes
    )
    {
        $this->tokenEndpoint = $tokenEndpoint;
        $this->filemuncherClientId = $filemuncherClientId;
        $this->filemuncherClientSecret = $filemuncherClientSecret;
        $this->backendScopes = $backendScopes;
        $this->tokenStorageAdapter = $tokenStorageAdapter;
    }

    private function getTokenStorage() : ITokenStorageAdapter
    {
        return $this->tokenStorageAdapter;
    }

    /**
     * Make call to oauth token endpoint
     *
     * @return JsonWebToken
     */
    public function getJWT(array $scopes) : JsonWebToken
    {
        $params = array(
            'grant_type' => "client_credentials", 
            'client_id' => $this->filemuncherClientId, 
            'client_secret' => $this->filemuncherClientSecret,
            'scope' => implode(' ', $scopes)
        );

        $curl = curl_init($this->tokenEndpoint);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HEADER,'Content-Type: application/x-www-form-urlencoded');

        $postData = "";

        //This is needed to properly form post the credentials object
        foreach($params as $k => $v) {
            $postData .= $k . '='.urlencode($v).'&';
        }

        $postData = rtrim($postData, '&');

        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

        $jsonResponse = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        // evaluate for success response
        if ($status != 200) {
            $errorMessage = "Error: call to URL \"$this->tokenEndpoint\" failed with status \"$status\", response \"$jsonResponse\", curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl) . "\n";
            throw new FileMuncherHttpException($errorMessage, curl_errno($curl));
        }

        curl_close($curl);
        
        $jsonArray = json_decode($jsonResponse, true);

        $token = new JsonWebToken($this->filemuncherClientSecret);
        $token->fromArray($jsonArray);

        return $token;
    }

    protected function joinPaths(array $paths)
    {
        return preg_replace('#/+#','/',join('/', $paths));
    }

    /**
     * Returns an access token for the File Muncher api by either 
     * getting a cached version or requesting a new one if
     * expired or null
     *
     * @return JsonWebToken
     */
    public function getBackendToken() : JsonWebToken
    {
        $jwtCache = $this->getTokenStorage();
        $token = $jwtCache->getToken();
        if($token === null) {
            $token = $this->getJWT($this->backendScopes);
            $jwtCache->setToken($token);
        }

        return $token;
    }
}