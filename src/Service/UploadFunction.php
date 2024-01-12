<?php
/*
namespace App\Service;

use App\Entity\Video;

class UploadFunction
{
    public function uploadFile(Video $video)
    {
        $originalVideoName = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeVideoName = $slugger->slug($originalVideoName);
        $newVideoName = $safeVideoName . '-' . uniqid() . '.' . $videoFile->guessExtension();
        $videoFile->move(dirname(__DIR__, 2) . '/assets/images', $newVideoName);
        $pimpoye = $video->setFile($newVideoName);

        return $pimpoye;
    }
}*/
