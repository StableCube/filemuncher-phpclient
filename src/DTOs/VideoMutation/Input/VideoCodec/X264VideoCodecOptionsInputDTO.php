<?php

namespace StableCube\FileMuncherClient\DTOs\VideoMutation\Input\VideoCodec;

class X264VideoCodecOptionsInputDTO extends VideoCodecOptionsBaseInputDTO
{
    public $fastFirstPass;
    public $enableFastStart;
    public $pFrameWeightedPrediction;
    public $a53ClosedCaptions;
    public $constantRateFactor;
    public $constantRateFactorMax;
    public $preset;
    public $tune;
    public $profile;

    function __construct()
    {
        $this->setCodec('Libx264');

    }

    public function getFastFirstPass() : bool
    {
        return $this->fastFirstPass;
    }

    public function setFastFirstPass(bool $fastFirstPass)
    {
        $this->fastFirstPass = $fastFirstPass;
    }

    public function getEnableFastStart() : bool
    {
        return $this->enableFastStart;
    }

    public function setEnableFastStart(bool $enableFastStart)
    {
        $this->enableFastStart = $enableFastStart;
    }

    public function getPFrameWeightedPrediction() : int
    {
        return $this->pFrameWeightedPrediction;
    }

    public function setPFrameWeightedPrediction(int $pFrameWeightedPrediction)
    {
        $this->pFrameWeightedPrediction = $pFrameWeightedPrediction;
    }

    public function getA53ClosedCaptions() : bool
    {
        return $this->a53ClosedCaptions;
    }

    public function setA53ClosedCaptions(bool $a53ClosedCaptions)
    {
        $this->a53ClosedCaptions = $a53ClosedCaptions;
    }

    public function getConstantRateFactor() : int
    {
        return $this->constantRateFactor;
    }

    public function setConstantRateFactor(int $constantRateFactor)
    {
        $this->constantRateFactor = $constantRateFactor;
    }

    public function getConstantRateFactorMax() : int
    {
        return $this->constantRateFactorMax;
    }

    public function setConstantRateFactorMax(int $constantRateFactorMax)
    {
        $this->constantRateFactorMax = $constantRateFactorMax;
    }

    public function getPreset() : string
    {
        return $this->preset;
    }

    public function setPreset(string $preset)
    {
        $this->preset = $preset;
    }

    public function getTune() : string
    {
        return $this->tune;
    }

    public function setTune(string $tune)
    {
        $this->tune = $tune;
    }

    public function getProfile() : string
    {
        return $this->profile;
    }

    public function setProfile(string $profile)
    {
        $this->profile = $profile;
    }
}