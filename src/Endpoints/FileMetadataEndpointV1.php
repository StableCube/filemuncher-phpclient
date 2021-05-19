<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\DTOs\Shared\Output\FileMetadataOutputDTO;
use StableCube\FileMuncherClient\Models\ApiResponse;
use StableCube\FileMuncherClient\Models\FileMetadataCollectionApiResponse;
use StableCube\FileMuncherClient\Models\FileMetadataApiResponse;
use StableCube\FileMuncherClient\Models\JsonWebToken;

class FileMetadataEndpointV1 extends EndpointBase
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

    public function getByWorkspace(string $workspaceId) : FileMetadataCollectionApiResponse
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/file-metadata/{$workspaceId}");

        $dataResponse = new FileMetadataCollectionApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJsonArray();

        $data = array();
        foreach ($jsonData['metadata'] as $entryRaw) {
            $metaData = new FileMetadataOutputDTO();
            $metaData->setWorkspaceId($entryRaw['workspaceId']);
            $metaData->setDirectory($entryRaw['directory']);
            $metaData->setFilename($entryRaw['filename']);
            $metaData->setTags($entryRaw['tags']);
            
            array_push($data, $metaData);
        }

        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function getByDirectory(string $workspaceId, string $dirName) : FileMetadataCollectionApiResponse
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/file-metadata/{$workspaceId}/{$dirName}");

        $dataResponse = new FileMetadataCollectionApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJsonArray();

        $data = array();
        foreach ($jsonData['metadata'] as $entryRaw) {
            $metaData = new FileMetadataOutputDTO();
            $metaData->setWorkspaceId($entryRaw['workspaceId']);
            $metaData->setDirectory($entryRaw['directory']);
            $metaData->setFilename($entryRaw['filename']);
            $metaData->setTags($entryRaw['tags']);

            array_push($data, $metaData);
        }

        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function getByFile(string $workspaceId, string $dirName, string $fileName) : FileMetadataApiResponse
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/file-metadata/{$workspaceId}/{$dirName}/{$fileName}");

        $dataResponse = new FileMetadataApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();

        $metaData = new FileMetadataOutputDTO();
        $metaData->setWorkspaceId($jsonData->workspaceId);
        $metaData->setDirectory($jsonData->directory);
        $metaData->setFilename($jsonData->filename);
        $metaData->setTags($jsonData->tags);

        $dataResponse->setData($data);

        return $dataResponse;
    }
}
