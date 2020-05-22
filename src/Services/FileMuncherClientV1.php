<?php

namespace StableCube\FileMuncherClient\Services;

use StableCube\FileMuncherClient\Models\Workspace;
use StableCube\FileMuncherClient\Models\WorkspaceSession;
use StableCube\FileMuncherClient\Models\JsonWebToken;
use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\Endpoints\WorkspaceEndpointV1;
use StableCube\FileMuncherClient\Endpoints\WorkspaceSessionEndpointV1;
use StableCube\FileMuncherClient\Endpoints\UploadAuthorizationEndpointV1;
use StableCube\FileMuncherClient\Endpoints\FileMetadataEndpointV1;
use StableCube\FileMuncherClient\Endpoints\JobEndpointV1;

class FileMuncherClientV1
{
    private $tokenManager;
    private $workspaceHubApiUriRoot;

    function __construct(OAuthTokenManager $tokenManager, string $workspaceHubApiUriRoot)
    {
        $this->tokenManager = $tokenManager;
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;
    }

    /**
     * Gets the WorkspaceEndpointV1 endpoint
     *
     * @return \StableCube\FileMuncherClient\Endpoints\WorkspaceEndpointV1
     */
    public function workspaceEndpoint() : WorkspaceEndpointV1
    {
        return new WorkspaceEndpointV1(
            $this->tokenManager, 
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
            $this->tokenManager, 
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
            $this->tokenManager, 
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
            $this->tokenManager, 
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
            $this->tokenManager, 
            $this->workspaceHubApiUriRoot
        );
    }
}