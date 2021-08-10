<?php

namespace StableCube\FileMuncherClient\Models;

class UploadAuthorization
{
    private $id;
    private $creationDate;
    private $workspaceId;
    private $workspaceSessionId;
    private $accountId;
    private $documentType;
    private $maxFileSizeBytes;
    private $fileUploaded;
    private $directory;
    private $filename;

    function __construct()
    {
        $this->fileUploaded = false;
    }

    public function getId() : string
    {
        return $this->id;
    }

    public function setId(string $value)
    {
        $this->id = $value;
    }

    public function getCreationDate() : \DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTime $value)
    {
        $this->creationDate = $value;
    }

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $value)
    {
        $this->workspaceId = $value;
    }

    public function getWorkspaceSessionId() : string
    {
        return $this->workspaceSessionId;
    }

    public function setWorkspaceSessionId(string $value)
    {
        $this->workspaceSessionId = $value;
    }

    public function getAccountId() : string
    {
        return $this->accountId;
    }

    public function setAccountId(string $value)
    {
        $this->accountId = $value;
    }

    public function getDocumentType() : string
    {
        return $this->documentType;
    }

    public function setDocumentType(string $value)
    {
        $this->documentType = $value;
    }

    public function getMaxFileSizeBytes() : int
    {
        return $this->maxFileSizeBytes;
    }

    public function setMaxFileSizeBytes(int $value)
    {
        $this->maxFileSizeBytes = $value;
    }

    public function getFileUploaded() : bool
    {
        return $this->fileUploaded;
    }

    public function setFileUploaded(bool $value)
    {
        $this->fileUploaded = $value;
    }

    public function getDirectory() : ?string
    {
        return $this->directory;
    }

    public function setDirectory(string $value)
    {
        $this->directory = $value;
    }

    public function getFilename() : ?string
    {
        return $this->filename;
    }

    public function setFilename(string $value)
    {
        $this->filename = $value;
    }

    public function fromApiResponse(object $source)
    {
        $this->setId($source->id);
        $this->setCreationDate(new \DateTime($source->creationDate));
        $this->setAccountId($source->accountId);
        $this->setWorkspaceId($source->workspaceId);
        $this->setWorkspaceSessionId($source->workspaceSessionId);
        $this->setDocumentType($source->documentType);
        $this->setMaxFileSizeBytes($source->maxFileSizeBytes);
        $this->setFileUploaded($source->fileUploaded);

        if(property_exists($source, 'directory')) {
            $this->setDirectory($source->directory);
        }

        if(property_exists($source, 'filename')) {
            $this->setFilename($source->filename);
        }
    }
}