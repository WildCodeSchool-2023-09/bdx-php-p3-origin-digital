<?php

namespace App\Twig\Components;

use http\Env\Response;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use App\Repository\VideoRepository;

#[AsLiveComponent]
final class VideoSearch
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(private VideoRepository $videoRepository)
    {
    }
    public function getVideos(): array
    {
        $videos = $this->videoRepository->findLikeName($this->query);
        return $videos;
    }
  /*  public function resultSearch(): Response
    {
        return $this->render('search_results.html.twig', [
            'video' => $this->getVideos(),
            ]);
    }*/
}
