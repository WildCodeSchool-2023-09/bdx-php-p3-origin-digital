<?php

namespace App\DataFixtures;

use App\Entity\PageSection;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class SectionFixtures extends Fixture implements DependentFixtureInterface
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $section = new Section();
        $section->setName('A la une');
        $section->addVideo($this->getReference('video_INSIDE - PSG : le film de la qualif'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Dans les coulisses de la Ligue des Nations I FFF 2023'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Le passage triomphal de Manon d\'escalade de difficulté 2023 !'));
        $section->setType($this->getReference('type_Carousel Statique'));
        $slug = $this->slugger->slug($section->getName());
        $section->setSlugSection($slug);
        $manager->persist($section);
        $this->addReference('section_Championnat de France de Football', $section);


        $section = new Section();
        $section->setName('Championnat de France de Football');
        $section->addVideo($this->getReference('video_INSIDE - PSG : le film de la qualif'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Dans les coulisses de la Ligue des Nations I FFF 2023'));
        $section->addVideo($this->getReference('video_HIGHLIGHTS Slavia Prague vs Olympique Lyonnais -- UEFA
        Women s Champions League 2023-24'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Le passage triomphal de Manon d\'escalade de difficulté 2023 !'));
        $section->setType($this->getReference('type_Hero Slider'));
        $slug = $this->slugger->slug($section->getName());
        $section->setSlugSection($slug);
        $manager->persist($section);
        $this->addReference('section_TEST 2', $section);

        $section = new Section();
        $section->setName('Championnat de France de Football');
        $section->addVideo($this->getReference('video_INSIDE - PSG : le film de la qualif'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Dans les coulisses de la Ligue des Nations I FFF 2023'));
        $section->addVideo($this->getReference('video_HIGHLIGHTS Slavia Prague vs Olympique Lyonnais -- UEFA
        Women s Champions League 2023-24'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Le passage triomphal de Manon d\'escalade de difficulté 2023 !'));
        $section->setType($this->getReference('type_Carousel Dynamique'));
        $slug = $this->slugger->slug($section->getName());
        $section->setSlugSection($slug);
        $manager->persist($section);
        $this->addReference('section_TEST 3', $section);

        $section = new Section();
        $section->setName('Toutes les vidéos de football');
        $section->addVideo($this->getReference('video_INSIDE - PSG : le film de la qualif'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Dans les coulisses de la Ligue des Nations I FFF 2023'));
        $section->addVideo($this->getReference('video_HIGHLIGHTS Slavia Prague vs Olympique Lyonnais -- UEFA
        Women s Champions League 2023-24'));
        $section->addVideo($this->getReference('video_Résumé OL - Montpellier 16e de finale de Coupe de France'));
        $section->addVideo($this->getReference('video_Le passage triomphal de Manon d\'escalade de difficulté 2023 !'));
        $section->setType($this->getReference('type_Grille Dynamique'));
        $slug = $this->slugger->slug($section->getName());
        $section->setSlugSection($slug);
        $manager->persist($section);
        $this->addReference('section_TEST 4', $section);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            VideoFixtures::class,
            TypeFixtures::class,
        ];
    }
}
