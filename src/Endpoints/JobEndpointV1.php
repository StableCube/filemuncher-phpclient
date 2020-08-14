<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\DTOs\Shared\Output\TaskBatchCreatedOutputDTO;
use StableCube\FileMuncherClient\DTOs\Shared\Output\TaskCreatedOutputDTO;
use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\VideoToolBatchInputDTO;
use StableCube\FileMuncherClient\DTOs\FileExport\Input\ExportInputDTO;
use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\ImageToolBatchInputDTO;
use StableCube\FileMuncherClient\Models\ApiResponse;
use StableCube\FileMuncherClient\Models\TaskBatchApiResponse;
use StableCube\FileMuncherClient\Models\JsonWebToken;

class JobEndpointV1 extends EndpointBase
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

    private function responseToBatchCreatedOutput(object $response) : TaskBatchCreatedOutputDTO
    {
        $output = new TaskBatchCreatedOutputDTO();
        $output->setId($response->id);
        $output->setWorkspaceId($response->workspaceId);
        $output->setJobId($response->jobId);
        $output->setMetaTags($response->metaTags);

        $taskArray = array();
        foreach ($response->tasks as $taskRaw) {
            $task = new TaskCreatedOutputDTO();
            $task->setId($taskRaw->id);
            $task->setBatchId($taskRaw->batchId);
            $task->setBatchIndex($taskRaw->batchIndex);

            $metaTags = array();
            foreach ($taskRaw->metaTags as $metaTag) {
                $metaTags[$metaTag[0]] = $metaTag[1];
            }

            $task->setMetaTags($metaTags);

            array_push($taskArray, $task);
        }

        $output->setTasks($taskArray);

        return $output;
    }

    public function startVideoMutation(VideoToolBatchInputDTO $inputData) : TaskBatchApiResponse
    {
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/jobs/video-mutation/job-batch", $inputData);

        $dataResponse = new TaskBatchApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();
        $data = $this->responseToBatchCreatedOutput($jsonData);
        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function startImageMutation(ImageToolBatchInputDTO $inputData) : TaskBatchApiResponse
    {
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/jobs/image-mutation/job-batch", $inputData);

        $dataResponse = new TaskBatchApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();
        $data = $this->responseToBatchCreatedOutput($jsonData);
        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function startFileExport(ExportInputDTO $jobInput) : TaskBatchApiResponse
    {
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/jobs/export/job-batch", $jobInput);

        $dataResponse = new TaskBatchApiResponse();
        $dataResponse->setStatusCode($response->getStatusCode());
        if($response->succeeded() === false) {
            return $dataResponse;
        }

        $jsonData = $response->getResponseJson();
        $data = $this->responseToBatchCreatedOutput($jsonData);
        $dataResponse->setData($data);

        return $dataResponse;
    }

    public function importHttpPull(string $workspaceId, string $sourceWebPath, string $localDestinationPath)
    {
        $this->curlDownloadFile($sourceWebPath, $localDestinationPath);
    }
}
