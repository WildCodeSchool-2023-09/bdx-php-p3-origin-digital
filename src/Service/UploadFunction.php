<?php

namespace App\Service;

use App\Entity\Video;
use Symfony\Component\String\Slugger\SluggerInterface;

class UploadFunction
{
    public function uploadFile(Video $video, mixed $videoFile, string $dossier, SluggerInterface $slugger)
    {
        $originalVideoName = pathinfo($videoFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeVideoName = $slugger->slug($originalVideoName);
        $newVideoName = $safeVideoName . '-' . uniqid() . '.' . $videoFile->guessExtension();
        $videoFile->move(dirname(__DIR__, 2) . "/public/upload/$dossier", $newVideoName);
        return $video->setFile($newVideoName);
    }
}
