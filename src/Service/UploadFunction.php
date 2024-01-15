<?php

namespace App\Service;

use App\Entity\Video;
use Symfony\Component\String\Slugger\SluggerInterface;

class UploadFunction
{
    public function uploadFile(mixed $file, string $dossier, SluggerInterface $slugger): string
    {
        $originalVideoName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeVideoName = $slugger->slug($originalVideoName);
        $newVideoName = $safeVideoName . '-' . uniqid() . '.' . $file->guessExtension();
        $file->move(dirname(__DIR__, 2)  . $dossier, $newVideoName);
        return $newVideoName;
    }
}
