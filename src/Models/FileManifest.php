<?php

namespace StableCube\FileMuncherClient\Models;

class FileManifest
{
    private $webPath;
    private $source;
    private $transcodes;
    private $thumbnails;
    private $extractedFrames;

    public function getWebPath() : string
    {
        return $this->webPath;
    }

    public function setWebPath(string $webPath)
    {
        $this->webPath = $webPath;
    }

    public function getSource() : string
    {
        return $this->source;
    }

    public function setSource(string $source)
    {
        $this->source = $source;
    }

    public function getTranscodes() : array
    {
        return $this->transcodes;
    }

    public function setTranscodes(array $transcodes)
    {
        $this->transcodes = $transcodes;
    }

    public function getThumbnails() : array
    {
        return $this->thumbnails;
    }

    public function setThumbnails(array $thumbnails)
    {
        $this->thumbnails = $thumbnails;
    }

    public function getExtractedFrames() : array
    {
        return $this->extractedFrames;
    }

    public function setExtractedFrames(array $extractedFrames)
    {
        $this->extractedFrames = $extractedFrames;
    }
}