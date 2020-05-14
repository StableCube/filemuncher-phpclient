<?php

namespace StableCube\FileMuncherClient\Models;

use StableCube\FileMuncherClient\Models\WorkspaceFileMetadata;
use StableCube\FileMuncherClient\Exceptions\ManifestEntryNotFoundException;

class WorkspaceFileMetadataCollection
{
    private $exportWebRoot;

    private $entries = [];

    public function getExportWebRoot() : string
    {
        return $this->exportWebRoot;
    }

    public function setExportWebRoot(string $exportWebRoot)
    {
        $this->exportWebRoot = $exportWebRoot;
    }

    public function getEntries() : array
    {
        return $this->entries;
    }

    public function getEntry(int $entryIndex) : ExportManifestEntry
    {
        return $this->entries[$entryIndex];
    }

    public function getEntryByIdentifier(string $identifier) : ExportManifestEntry
    {
        for ($i=0; $i < \count($this->getEntries()); $i++) { 
            $entry = $this->getEntry($i);

            if($entry->getIdentifier() === $identifier)
            {
                return $entry;
            }
        }

        throw new ManifestEntryNotFoundException($this, $identifier);
    }

    public function addEntry(ExportManifestEntry $entry)
    {
        array_push($this->entries , $entry);
    }
}