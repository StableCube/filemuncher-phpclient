<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Models\ApiResponse;
use StableCube\FileMuncherClient\Models\WorkspaceApiResponse;
use StableCube\FileMuncherClient\Models\Workspace;
use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\Exceptions\FileMuncherGraphQLErrorException;

class WorkspaceEndpointV1 extends EndpointBase
{
    private $workspaceHubApiUriRoot;

    function __construct(
        OAuthTokenManager $tokenManager, 
        string $workspaceHubApiUriRoot,
        bool $disableCertValidation = false)
    {
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;

        parent::__construct($tokenManager, $disableCertValidation);
    }

    public function create() : WorkspaceApiResponse
    {
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/workspaces");
        $dataResponse = new WorkspaceApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();

        $data = new Workspace();
        $data->setId($jsonData->id);
        $data->setCreationDate(new \DateTime($jsonData->creationDate));
        $data->setExpireDate(new \DateTime($jsonData->expireDate));
        $data->setFileServerUri($jsonData->fileServerUri);

        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function delete(string $workspaceId) : ApiResponse
    {
        return $this->curlDelete("{$this->workspaceHubApiUriRoot}/workspaces/{$workspaceId}");
    }
}
