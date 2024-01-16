<?php

namespace App\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use App\Entity\Video;

#[AsLiveComponent]
final class Favoris
{
    use DefaultActionTrait;

    #[LiveProp]
    public Video $video;

    public function __construct(
        private Security $security,
        private EntityManagerInterface $entityManager
    ) {
    }

    #[LiveAction]
    public function toggle(): void
    {
        $user = $this->security->getUser();
        if ($user->getFavoris()->contains($this->video)) {
            $user->removeFavoris($this->video);
        } else {
            $user->addFavoris($this->video);
        }
        $this->entityManager->flush();
    }
}
