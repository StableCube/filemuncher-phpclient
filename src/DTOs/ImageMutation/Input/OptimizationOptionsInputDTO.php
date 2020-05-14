<?php

namespace StableCube\FileMuncherClient\DTOs\ImageMutation\Input;

class OptimizationOptionsInputDTO
{
    public $useLossy;
    public $lossyQuality;
    public $pngOptimiseLevel;
    public $pngLossySpeed;

    public function getUseLossy() : bool
    {
        return $this->useLossy;
    }

    public function setUseLossy(bool $useLossy)
    {
        $this->useLossy = $useLossy;
    }

    public function getLossyQuality() : int
    {
        return $this->lossyQuality;
    }

    public function setLossyQuality(int $lossyQuality)
    {
        $this->lossyQuality = $lossyQuality;
    }

    public function getPngOptimiseLevel() : int
    {
        return $this->pngOptimiseLevel;
    }

    public function setPngOptimiseLevel(int $pngOptimiseLevel)
    {
        $this->pngOptimiseLevel = $pngOptimiseLevel;
    }

    public function getPngLossySpeed() : int
    {
        return $this->pngLossySpeed;
    }

    public function setPngLossySpeed(int $pngLossySpeed)
    {
        $this->pngLossySpeed = $pngLossySpeed;
    }
}