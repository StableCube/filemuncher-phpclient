<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Models\ApiResponse;
use StableCube\FileMuncherClient\Models\WorkspaceSession;
use StableCube\FileMuncherClient\Models\WorkspaceSessionApiResponse;
use StableCube\FileMuncherClient\Models\JsonWebToken;

class WorkspaceSessionEndpointV1 extends EndpointBase
{
    private $workspaceHubApiUriRoot;

    function __construct(
        JsonWebToken $endpointToken, 
        string $workspaceHubApiUriRoot
    )
    {
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;

        parent::__construct($endpointToken);
    }

    public function create(string $workspaceId, string $authorizedUserId) : WorkspaceSessionApiResponse
    {
        $input = array(
            'workspaceId' => $workspaceId,
            'authorizedUserId' => $authorizedUserId
        );

        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/workspace-sessions", $input);

        $dataResponse = new WorkspaceSessionApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();

        $data = new WorkspaceSession();
        $data->setId($jsonData->id);
        $data->setWorkspaceId($jsonData->workspaceId);
        $data->setCreationDate(new \DateTime($jsonData->creationDate));
        $data->setExpireDate(new \DateTime($jsonData->expireDate));

        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function get(string $id) : WorkspaceSessionApiResponse
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/workspace-sessions/{$id}");

        $dataResponse = new WorkspaceSessionApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();

        $data = new WorkspaceSession();
        $data->setId($response->id);
        $data->setWorkspaceId($response->workspaceId);
        $data->setCreationDate(new \DateTime($response->creationDate));
        $data->setExpireDate(new \DateTime($response->expireDate));

        $dataResponse->setData($data);

        return $dataResponse;
    }
}
