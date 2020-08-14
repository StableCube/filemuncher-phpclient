<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Models\ApiResponse;
use StableCube\FileMuncherClient\Models\UploadAuthorizationApiResponse;
use StableCube\FileMuncherClient\Models\UploadAuthorization;
use StableCube\FileMuncherClient\Models\JsonWebToken;

class UploadAuthorizationEndpointV1 extends EndpointBase
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

    public function create(string $workspaceSessionId, string $documentType, int $maxFileSizeBytes) : UploadAuthorizationApiResponse
    {
        $input = array(
            'workspaceSessionId' => $workspaceSessionId,
            'maxFileSizeBytes' => $maxFileSizeBytes,
            'documentType' => $documentType,
        );

        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/upload-authorizations", $input);

        $dataResponse = new UploadAuthorizationApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();

        $data = new UploadAuthorization();
        $data->fromApiResponse($jsonData);

        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function get(string $id) : UploadAuthorizationApiResponse
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/upload-authorizations/{$id}");

        $dataResponse = new UploadAuthorizationApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();

        $data = new UploadAuthorization();
        $data->fromApiResponse($jsonData);

        $dataResponse->setData($data);

        return $dataResponse;
    }
}
