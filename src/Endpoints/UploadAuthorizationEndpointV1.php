<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\Models\UploadAuthorization;

class UploadAuthorizationEndpointV1 extends EndpointBase
{
    private $workspaceHubApiUriRoot;

    function __construct(
        OAuthTokenManager $tokenManager, 
        string $workspaceHubApiUriRoot)
    {
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;

        parent::__construct($tokenManager);
    }


    public function create(string $workspaceSessionId, string $documentType, int $maxFileSizeBytes) : UploadAuthorization
    {
        $input = array(
            'workspaceSessionId' => $workspaceSessionId,
            'maxFileSizeBytes' => $maxFileSizeBytes,
            'documentType' => $documentType,
        );

        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/upload-authorizations", \json_encode($input));

        $data = new UploadAuthorization();
        $data->fromApiResponse($response);

        return $data;
    }

    public function get(string $id) : UploadAuthorization
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/upload-authorizations/{$id}");

        $data = new UploadAuthorization();
        $data->fromApiResponse($response);

        return $data;
    }
}
