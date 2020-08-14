<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\Workspace;
use StableCube\FileMuncherClient\Models\WorkspaceSession;
use StableCube\FileMuncherClient\Models\JsonWebToken;
use StableCube\FileMuncherClient\Services\ITokenStorageAdapter;
use StableCube\FileMuncherClient\Endpoints\WorkspaceEndpointV1;
use StableCube\FileMuncherClient\Endpoints\WorkspaceSessionEndpointV1;
use StableCube\FileMuncherClient\Endpoints\UploadAuthorizationEndpointV1;
use StableCube\FileMuncherClient\Endpoints\FileMetadataEndpointV1;
use StableCube\FileMuncherClient\Endpoints\JobEndpointV1;
use StableCube\FileMuncherClient\Exceptions\FileMuncherHttpException;

class FileMuncherClientV1
{
    private $tokenEndpoint;
    private $workspaceHubApiUriRoot;
    private $clientId;
    private $clientSecret;
    private $endpointTokenScopes;
    private $tokenCache;

    function __construct(
        string $tokenEndpoint,
        string $workspaceHubApiUriRoot,
        string $clientId,
        string $clientSecret,
        array $endpointTokenScopes,
        ITokenStorageAdapter $tokenCache
    )
    {
        $this->tokenEndpoint = $tokenEndpoint;
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->endpointTokenScopes = $endpointTokenScopes;
        $this->tokenCache = $tokenCache;
    }

    protected function getJsonWebTokenCache() : ITokenStorageAdapter
    {
        return $this->tokenCache;
    }

    protected function getClientId() : string
    {
        return $this->clientId;
    }

    protected function getClientSecret() : string
    {
        return $this->clientSecret;
    }

    /**
     * Make call to identity server to get a json web token
     *
     * @return JsonWebToken
     */
    public function generateJsonWebToken(array $scopes) : JsonWebToken
    {
        $params = array(
            'grant_type' => "client_credentials", 
            'client_id' => $this->getClientId(), 
            'client_secret' => $this->getClientSecret(),
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

        $token = new JsonWebToken();
        $token->fromArray($jsonArray);

        return $token;
    }

    public function getEndpointToken() : JsonWebToken
    {
        $token = $this->getJsonWebTokenCache()->getToken();
        if($token === null) {
            $token = $this->generateJsonWebToken($this->endpointTokenScopes);
            $this->getJsonWebTokenCache()->setToken($token);
        }

        return $token;
    }

    /**
     * Gets the WorkspaceEndpointV1 endpoint
     *
     * @return \StableCube\FileMuncherClient\Endpoints\WorkspaceEndpointV1
     */
    public function workspaceEndpoint() : WorkspaceEndpointV1
    {
        return new WorkspaceEndpointV1(
            $this->getEndpointToken(), 
            $this->workspaceHubApiUriRoot
        );
    }

    /**
     * Gets the WorkspaceSessionEndpointV1 endpoint
     *
     * @return \StableCube\FileMuncherClient\Endpoints\WorkspaceSessionEndpointV1
     */
    public function workspaceSessionEndpoint() : WorkspaceSessionEndpointV1
    {
        return new WorkspaceSessionEndpointV1(
            $this->getEndpointToken(), 
            $this->workspaceHubApiUriRoot
        );
    }

    /**
     * Gets the UploadAuthorizationEndpointV1 endpoint
     *
     * @return \StableCube\FileMuncherClient\Endpoints\UploadAuthorizationEndpointV1
     */
    public function uploadAuthorizationEndpoint() : UploadAuthorizationEndpointV1
    {
        return new UploadAuthorizationEndpointV1(
            $this->getEndpointToken(), 
            $this->workspaceHubApiUriRoot
        );
    }

    /**
     * Gets the FileMetadataEndpointV1 endpoint
     *
     * @return \StableCube\FileMuncherClient\Endpoints\FileMetadataEndpointV1
     */
    public function fileMetadataEndpoint() : FileMetadataEndpointV1
    {
        return new FileMetadataEndpointV1(
            $this->getEndpointToken(), 
            $this->workspaceHubApiUriRoot
        );
    }

    /**
     * Gets the JobEndpointV1 endpoint
     *
     * @return \StableCube\FileMuncherClient\Endpoints\JobEndpointV1
     */
    public function jobEndpoint() : JobEndpointV1
    {
        return new JobEndpointV1(
            $this->getEndpointToken(), 
            $this->workspaceHubApiUriRoot
        );
    }
}