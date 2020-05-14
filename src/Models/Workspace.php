<?php

namespace StableCube\FileMuncherClient\Models;

class Workspace implements \JsonSerializable
{
    protected $id;
    protected $creationDate;
    protected $expireDate;
    protected $fileServerUri;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getCreationDate() : \DateTime
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTime $value)
    {
        $this->creationDate = $value;
    }

    public function getExpireDate() : \DateTime
    {
        return $this->expireDate;
    }

    public function setExpireDate(\DateTime $value)
    {
        $this->expireDate = $value;
    }

    public function getFileServerUri() : string
    {
        return $this->fileServerUri;
    }

    public function setFileServerUri(string $value)
    {
        $this->fileServerUri = $value;
    }

    public function jsonSerialize() : array
    {
        return [
            'id' => $this->id, 
            'creationDate' => $this->creationDate,
            'expireDate' => $this->expireDate,
            'fileServerUri' => $this->fileServerUri
        ];
    }
}