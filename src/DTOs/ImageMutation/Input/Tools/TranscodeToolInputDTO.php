<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input\Tools;

use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\ResizeOptionsInputDTO;
use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\OptimizationOptionsInputDTO;
use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\OutputFormats\GifFormatOptionsInputDTO;
use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\OutputFormats\JpegFormatOptionsInputDTO;
use StableCube\FileMuncherClient\DTOs\ImageMutation\Input\OutputFormats\PngFormatOptionsInputDTO;

class TranscodeToolInputDTO extends MutationToolBase
{
    public $sourceFilename;
    public $outputMode;
    public $outputFormat;
    public $resizeOptions;
    public $optimizationOptions;
    public $gifOptions;
    public $jpegOptions;
    public $pngOptions;

    function __construct()
    {
        $this->setMutationTool('Transcode');
    }

    public function getSourceFilename() : string
    {
        return $this->sourceFilename;
    }

    public function setSourceFilename(string $sourceFilename)
    {
        $this->sourceFilename = $sourceFilename;
    }
    
    public function getOutputMode() : string
    {
        return $this->outputMode;
    }

    public function setOutputMode(string $outputMode)
    {
        $this->outputMode = $outputMode;
    }

    public function getOutputFormat() : string
    {
        return $this->outputFormat;
    }

    public function setOutputFormat(string $outputFormat)
    {
        $this->outputFormat = $outputFormat;
    }

    public function getResizeOptions() : ResizeOptionsInputDTO
    {
        return $this->resizeOptions;
    }

    public function setResizeOptions(ResizeOptionsInputDTO $resizeOptions)
    {
        $this->resizeOptions = $resizeOptions;
    }

    public function getOptimizationOptions() : OptimizationOptionsInputDTO
    {
        return $this->optimizationOptions;
    }

    public function setOptimizationOptions(OptimizationOptionsInputDTO $optimizationOptions)
    {
        $this->optimizationOptions = $optimizationOptions;
    }

    public function getGifOptions() : GifFormatOptionsInputDTO
    {
        return $this->gifOptions;
    }

    public function setGifOptions(GifFormatOptionsInputDTO $gifOptions)
    {
        $this->gifOptions = $gifOptions;
    }

    public function getJpegOptions() : JpegFormatOptionsInputDTO
    {
        return $this->jpegOptions;
    }

    public function setJpegOptions(JpegFormatOptionsInputDTO $jpegOptions)
    {
        $this->jpegOptions = $jpegOptions;
    }

    public function getPngOptions() : PngFormatOptionsInputDTO
    {
        return $this->pngOptions;
    }

    public function setPngOptions(PngFormatOptionsInputDTO $pngOptions)
    {
        $this->pngOptions = $pngOptions;
    }
}