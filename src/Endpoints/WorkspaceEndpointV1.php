<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Models\Workspace;
use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\Exceptions\FileMuncherGraphQLErrorException;

class WorkspaceEndpointV1 extends EndpointBase
{
    private $workspaceHubApiUriRoot;

    function __construct(
        OAuthTokenManager $tokenManager, 
        string $workspaceHubApiUriRoot)
    {
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;

        parent::__construct($tokenManager);
    }

    public function create() : Workspace
    {
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/workspaces");

        $data = new Workspace();
        $data->setId($response['id']);
        $data->setCreationDate(new \DateTime($response['creationDate']));
        $data->setExpireDate(new \DateTime($response['expireDate']));
        $data->setFileServerUri($response['fileServerUri']);

        return $data;
    }

    public function delete(string $workspaceId)
    {
        $this->curlDelete("{$this->workspaceHubApiUriRoot}/workspaces/{$workspaceId}");
    }
}
