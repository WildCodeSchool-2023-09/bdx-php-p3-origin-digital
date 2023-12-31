<?php

// src/DataFixtures/VideoFixtures.php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTimeImmutable;

class VideoFixtures extends Fixture implements DependentFixtureInterface
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
        $video->setFile('Beach-volley  à la rencontre de. Clémence Vieira et Aline Chamereau.mp4');
        $video->setImage('beachvolley.webp');
        $video->setDescription('Double championnes de France de beach-volley Clémence Vieira et 
        Aline Chamereau visent une participation aux Jeux Olympiques de Paris 2024.');
        $video->addCategory($this->getReference('category_Beach Volley'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('INSIDE - PSG  le film de la qualif.mp4');
        $video->setImage('psg.webp');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en Ligue des Champions 
        féminine face à Manchester United.');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('INSIDE - PSG  le film de la qualif.mp4');
        $video->setImage('psg.webp');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en 
        Ligue des Champions féminine face à Manchester United.');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('INSIDE - PSG  le film de la qualif.mp4');
        $video->setImage('psg.webp');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en Ligue 
        des Champions féminine face à Manchester United.');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);


        $video = new Video();
        $video->setTitle('Le passage triomphal de Manon Hily, au championnat de France 
        d\'escalade de difficulté 2023 !');
        $video->setFile('Le passage triomphal de Manon Hily, au championnat de France 
        d escalade de difficulté 2023 !.mp4');
        $video->setImage('escalade.webp');
        $video->setDescription('Manon Hily est devenue championne de France 2023 
        d escalade de difficulté, pour la première fois de sa carrière.');
        $video->addCategory($this->getReference('category_Escalade'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(false);
        $manager->persist($video);


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
