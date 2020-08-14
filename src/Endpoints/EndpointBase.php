<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Models\JsonWebToken;
use StableCube\FileMuncherClient\Models\VideoUploadSession;
use StableCube\FileMuncherClient\Models\FileManifest;
use StableCube\FileMuncherClient\Models\WorkspaceAccessToken;
use StableCube\FileMuncherClient\Models\ApiResponse;
use StableCube\FileMuncherClient\Exceptions\DestinationNotWriteableException;
use StableCube\FileMuncherClient\Exceptions\FileMuncherHttpException;
use StableCube\FileMuncherClient\Exceptions\DownloadFailedException;

abstract class EndpointBase
{
    private $endpointToken;

    function __construct(JsonWebToken $endpointToken)
    {
        $this->endpointToken = $endpointToken;
    }

    protected function getEndpointToken() : JsonWebToken
    {
        return $this->endpointToken;
    }

    private function curl(string $action, string $endpoint, $postData = null) : ApiResponse
    {
        $token = $this->getEndpointToken();
        
        $curl = curl_init($endpoint);
        curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $action);

        $contentLength = 0;
        if($postData != null) {
            $dataJson = \json_encode($postData);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dataJson);
            $contentLength = strlen($dataJson);
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . $token->getAccessToken(),
            'Content-Type: application/json',
            'Content-Length: ' . $contentLength)
            );

        $response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        $apiResponse = new ApiResponse();
        $apiResponse->setStatusCode($status);
        $apiResponse->setResponseData($response);

        curl_close($curl);

        return $apiResponse;
    }

    protected function curlPost(string $endpoint, $postData = null) : ApiResponse
    {
        $response = $this->curl('POST', $endpoint, $postData);

        return $response;
    }

    protected function curlPut(string $endpoint, $postData = null) : ApiResponse
    {
        $response = $this->curl('PUT', $endpoint, $postData);

        return $response;
    }

    protected function curlDelete(string $endpoint) : ApiResponse
    {
        $response = $this->curl('DELETE', $endpoint);

        return $response;
    }

    protected function curlGet(string $endpoint) : ApiResponse
    {
        $response = $this->curl('GET', $endpoint);

        return $response;
    }

    protected function curlDownloadFile(string $url, string $dest)
    {
        $pathInfo = pathinfo($dest);
        $destDirPath = $pathInfo['dirname'];
        if (!file_exists($destDirPath)) {
            mkdir($destDirPath, 0775, true);
        }

        if(!is_writable($destDirPath)){
            throw new DestinationNotWriteableException($destDirPath);
        }

        $options = array(
            CURLOPT_FILE => is_resource($dest) ? $dest : fopen($dest, 'w'),
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_URL => $url,
            CURLOPT_FAILONERROR => true,
        );

        $ch = curl_init();

        curl_setopt_array($ch, $options);
        $return = curl_exec($ch);

        if ($return === false)
        {
            throw new DownloadFailedException($url, curl_error($ch));
        }
    }
}