<?php

// src/DataFixtures/VideoFixtures.php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use DateTimeImmutable;

class VideoFixtures extends Fixture
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $video = new Video();
        $video->setTitle('Beach-volley : à la rencontre de. Clémence Vieira et Aline Chamereau');
        $video->setFile('https://www.youtube.com/
        watch?v=B549yay8K_M&list=PLK7yPhWUuO9XYTogt2WZFPmmvZVowtbof&index=2&ab_channel=SportenFrance');
        $video->setImage('beachvolley.webp');
        $video->setDescription('Double championnes de France de beach-volley Clémence Vieira et 
        Aline Chamereau visent une participation aux Jeux Olympiques de Paris 2024.');
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('https://www.youtube.com/watch?v=0AGP3ujvITU&list=PLK7yPhWUuO9XYTogt2WZFPmmvZVowtbof&index=
        1&ab_channel=SportenFrance');
        $video->setImage('psg.webp');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en Ligue des Champions 
        féminine face à Manchester United.');
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('https://www.youtube.com/watch?v=0AGP3ujvITU&list=
        PLK7yPhWUuO9XYTogt2WZFPmmvZVowtbof&index=1&ab_channel=SportenFrance');
        $video->setImage('psg.webp');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en 
        Ligue des Champions féminine face à Manchester United.');
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('https://www.youtube.com/watch?v=0AGP3ujvITU&list=
        PLK7yPhWUuO9XYTogt2WZFPmmvZVowtbof&index=1&ab_channel=SportenFrance');
        $video->setImage('psg.webp');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en Ligue 
        des Champions féminine face à Manchester United.');
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);


        // Créer des vidéos privées

        $video = new Video();
        $video->setTitle('Le passage triomphal de Manon Hily, au championnat de France 
        d\'escalade de difficulté 2023 !');
        $video->setFile('https://www.youtube.com/watch?v=2fd0nmNyiJk&list=
        PLK7yPhWUuO9XYTogt2WZFPmmvZVowtbof&index=5&ab_channel=SportenFrance');
        $video->setImage('escalade.webp');
        $video->setDescription('Manon Hily est devenue championne de France 2023 
        d\'escalade de difficulté, pour la première fois de sa carrière.');
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(false);
        $manager->persist($video);


        $manager->flush();
    }
}
