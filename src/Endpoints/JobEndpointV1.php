<?php

namespace StableCube\FileMuncherClient\Endpoints;

use StableCube\FileMuncherClient\Services\OAuthTokenManager;
use StableCube\FileMuncherClient\DTOs\Shared\Output\TaskBatchCreatedOutputDTO;
use StableCube\FileMuncherClient\DTOs\Shared\Output\TaskCreatedOutputDTO;
use StableCube\FileMuncherClient\DTOs\VideoMutation\Input\VideoToolBatchInputDTO;
use StableCube\FileMuncherClient\DTOs\FileExport\Input\ExportInputDTO;
use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\ImageToolBatchInputDTO;

class JobEndpointV1 extends EndpointBase
{
    private $workspaceHubApiUriRoot;

    function __construct(
        OAuthTokenManager $tokenManager, 
        string $workspaceHubApiUriRoot)
    {
        $this->workspaceHubApiUriRoot = $workspaceHubApiUriRoot;

        parent::__construct($tokenManager);
    }

    private function responseToBatchCreatedOutput(array $response) {
        $output = new TaskBatchCreatedOutputDTO();
        $output->setId($response['id']);
        $output->setWorkspaceId($response['workspaceId']);
        $output->setJobId($response['jobId']);
        $output->setMetaTags($response['metaTags']);

        $taskArray = array();
        foreach ($response['tasks'] as $taskRaw) {
            $task = new TaskCreatedOutputDTO();
            $task->setId($taskRaw['id']);
            $task->setBatchId($taskRaw['batchId']);
            $task->setBatchIndex($taskRaw['batchIndex']);

            $metaTags = array();
            foreach ($taskRaw['metaTags'] as $metaTag) {
                $metaTags[$metaTag[0]] = $metaTag[1];
            }

            $task->setMetaTags($metaTags);

            array_push($taskArray, $task);
        }

        $output->setTasks($taskArray);

        return $output;
    }

    public function startVideoMutation(VideoToolBatchInputDTO $inputData) : TaskBatchCreatedOutputDTO
    {
        $jsonData = json_encode($inputData);
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/jobs/video-mutation/job-batch", $jsonData);

        return $this->responseToBatchCreatedOutput($response);
    }

    public function startImageMutation(ImageToolBatchInputDTO $inputData) : TaskBatchCreatedOutputDTO
    {
        $jsonData = json_encode($inputData);
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/jobs/image-mutation/job-batch", $jsonData);

        return $this->responseToBatchCreatedOutput($response);
    }

    public function startFileExport(ExportInputDTO $jobInput) : TaskBatchCreatedOutputDTO
    {
        $jsonData = json_encode($jobInput);
        $response = $this->curlPost("{$this->workspaceHubApiUriRoot}/jobs/export/job-batch", $jsonData);

        return $this->responseToBatchCreatedOutput($response);
    }

    public function importHttpPull(string $workspaceId, string $sourceWebPath, string $localDestinationPath)
    {
        $this->curlDownloadFile($sourceWebPath, $localDestinationPath);
    }
}
