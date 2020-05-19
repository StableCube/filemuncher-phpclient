<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Models\WorkspaceSession;
use StableCube\FileMuncherClient\Services\OAuthTokenManager;

class WorkspaceSessionEndpointV1 extends EndpointBase
{
    private $workspaceHubApiUriRoot;

    function __construct(
        OAuthTokenManager $tokenManager, 
        string $workspaceHubApiUriRoot,
        bool $disableCertValidation = false
    )
    {
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;

        parent::__construct($tokenManager, $disableCertValidation);
    }

    public function create(string $workspaceId, string $apiKeySecret, bool $allowFileUpload) : WorkspaceSession
    {
        $input = array(
            'workspaceId' => $workspaceId,
            'apiKeySecret' => $apiKeySecret,
            'allowFileUpload' => $allowFileUpload,
        );

        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/workspace-sessions", \json_encode($input));

        $data = new WorkspaceSession();
        $data->setId($response['id']);
        $data->setWorkspaceId($response['workspaceId']);
        $data->setCreationDate(new \DateTime($response['creationDate']));
        $data->setExpireDate(new \DateTime($response['expireDate']));

        return $data;
    }

    public function get(string $id) : WorkspaceSession
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/workspace-sessions/{$id}");

        $data = new WorkspaceSession();
        $data->setId($response['id']);
        $data->setWorkspaceId($response['workspaceId']);
        $data->setCreationDate(new \DateTime($response['creationDate']));
        $data->setExpireDate(new \DateTime($response['expireDate']));

        return $data;
    }
}
