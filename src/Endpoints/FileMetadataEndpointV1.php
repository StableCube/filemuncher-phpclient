<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\DTOs\Shared\Output\FileMetadataOutputDTO;

class FileMetadataEndpointV1 extends EndpointBase
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

    public function getByWorkspace(string $workspaceId) : array
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/file-metadata/{$workspaceId}");

        $data = array();
        foreach ($response['metadata'] as $entryRaw) {
            $metaData = new FileMetadataOutputDTO();
            $metaData->setWorkspaceId($entryRaw['workspaceId']);
            $metaData->setDirectory($entryRaw['directory']);
            $metaData->setFilename($entryRaw['filename']);
            $metaData->setTags($entryRaw['tags']);
            
            array_push($data, $metaData);
        }

        return $data;
    }

    public function getByDirectory(string $workspaceId, string $dirName) : array
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/file-metadata/{$workspaceId}/{$dirName}");

        $data = array();
        foreach ($response['metadata'] as $entryRaw) {
            $metaData = new FileMetadataOutputDTO();
            $metaData->setWorkspaceId($entryRaw['workspaceId']);
            $metaData->setDirectory($entryRaw['directory']);
            $metaData->setFilename($entryRaw['filename']);
            $metaData->setTags($entryRaw['tags']);

            array_push($data, $metaData);
        }

        return $data;
    }

    public function getByFile(string $workspaceId, string $dirName, string $fileName) : FileMetadataOutputDTO
    {
        $response = $this->curlGet("{$this->workspaceHubApiUriRoot}/file-metadata/{$workspaceId}/{$dirName}/{$fileName}");

        $metaData = new FileMetadataOutputDTO();
        $metaData->setWorkspaceId($response['workspaceId']);
        $metaData->setDirectory($response['directory']);
        $metaData->setFilename($response['filename']);
        $metaData->setTags($response['tags']);

        return $data;
    }
}
