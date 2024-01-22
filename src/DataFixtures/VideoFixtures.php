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
        $video->setTitle('Beach-volley : à la rencontre de Clémence Vieira et Aline Chamereau');
        $video->setFile('Beach-volley  à la rencontre de. Clémence Vieira et Aline Chamereau.mp4');
        $video->setImage('beachvolley.jpg');
        $video->setDescription('Double championnes de France de beach-volley Clémence Vieira et
        Aline Chamereau visent une participation aux Jeux Olympiques de Paris 2024.');
        $video->addCategory($this->getReference('category_Beach Volley'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);
        $this->addReference('video_Beach-volley : à la rencontre de Clémence Vieira et Aline Chamereau', $video);

        $video = new Video();
        $video->setTitle('INSIDE - PSG : le film de la qualif');
        $video->setFile('INSIDE - PSG  le film de la qualif.mp4');
        $video->setImage('psg.jpg');
        $video->setDescription('Le Paris Saint-Germain jouait sa qualification en Ligue des Champions
        féminine face à Manchester United.');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);
        $this->addReference('video_INSIDE - PSG : le film de la qualif', $video);


        $video = new Video();
        $video->setTitle('Dans les coulisses de la Ligue des Nations I FFF 2023');
        $video->setFile('Dans les coulisses de la Ligue des Nations I FFF 2023.mp4');
        $video->setImage('fff.jpg');
        $video->setDescription('Découvrez comment les joueuses d\'Hervé Renard se sont imposées en Norvège,
        avant de faire match nul face à cette même équipe');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);
        $this->addReference('video_Dans les coulisses de la Ligue des Nations I FFF 2023', $video);


        $video = new Video();
        $video->setTitle('Le passage triomphal de Manon Hily, au championnat de France
        d\'escalade de difficulté 2023 !');
        $video->setFile('Le passage triomphal de Manon Hily au championnat de France
        d escalade de difficulté 2023.mp4');
        $video->setImage('escalade.jpg');
        $video->setDescription('Manon Hily est devenue championne de France 2023
        d escalade de difficulté, pour la première fois de sa carrière.');
        $video->addCategory($this->getReference('category_Escalade'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(false);
        $manager->persist($video);
        $this->addReference('video_Le passage triomphal de Manon Hily, au championnat de France
        d\'escalade de difficulté 2023 !', $video);

        $video = new Video();
        $video->setTitle('HIGHLIGHTS Slavia Prague vs Olympique Lyonnais -- UEFA
        Women s Champions League 2023-24');
        $video->setFile('HIGHLIGHTS Slavia Prague vs Olympique Lyonnais -- UEFA Women s Champions League 2023-24.mp4');
        $video->setImage('ol2.jpg');
        $video->setDescription('Le 14 Novembre 2023 – Slavia Praha vs. Olympique Lyonnais |
        1e journée de l\'UEFA Women\'s Champions League 2023-2024');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);
        $this->addReference('video_HIGHLIGHTS Slavia Prague vs Olympique Lyonnais -- UEFA
        Women s Champions League 2023-24', $video);

        $video = new Video();
        $video->setTitle('Résumé OL - Montpellier 16e de finale de Coupe de France');
        $video->setFile('Résumé OL - Montpellier 16e de finale de Coupe de France.mp4');
        $video->setImage('OL.jpg');
        $video->setDescription('Nos Fenottes se sont brillamment imposées 4 buts à 0 face à Montpellier
         et obtiennent leur ticket pour les 8es de finale de la Coupe de France !');
        $video->addCategory($this->getReference('category_Football'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);
        $this->addReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France', $video);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
