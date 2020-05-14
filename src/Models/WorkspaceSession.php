<?php

namespace StableCube\FileMuncherClient\Models;

use \DateTime;

class WorkspaceSession implements \JsonSerializable
{
    private $id;
    private $workspaceId;
    private $creationDate;
    private $expireDate;

    public function getId() : string
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getWorkspaceId() : string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(string $workspaceId)
    {
        $this->workspaceId = $workspaceId;
    }

    public function getCreationDate() : array
    {
        return $this->creationDate;
    }

    public function setCreationDate(DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function getExpireDate() : DateTime
    {
        return $this->expireDate;
    }

    public function setExpireDate(DateTime $expireDate)
    {
        $this->expireDate = $expireDate;
    }

    public function jsonSerialize() : array
    {
        return [
            'id' => $this->id, 
            'workspaceId' => $this->workspaceId,
            'creationDate' => $this->creationDate,
            'expireDate' => $this->expireDate
        ];
    }
}