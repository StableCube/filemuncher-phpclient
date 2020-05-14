<?php

namespace StableCube\FileMuncherClient\Exceptions;
use StableCube\FileMuncherClient\Models\ExportManifest;

class ManifestEntryNotFoundException extends \Exception
{
    public function __construct(ExportManifest $manifest, string $identifier)
    {
        $identifiersInManifest = array();

        for ($i=0; $i < \count($manifest->getEntries()); $i++) { 
            $entry = $manifest->getEntry($i);
            array_push($identifiersInManifest, $entry->getIdentifier());
        }

        $definedIdentifiers = join(", ", $identifiersInManifest);
        $message = "The manifest identifier \"{$identifier}\" was not found. Defined values are: {$definedIdentifiers}";

        parent::__construct($message, 500, null);
    }
}