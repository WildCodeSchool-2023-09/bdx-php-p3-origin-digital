<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\PageSection;

class PageSectionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $pageSection = new PageSection();
        $pageSection->setPage($this->getReference('page_Football Féminin'));
        $pageSection->setSection($this->getReference('section_Championnat de France de Football'));
        $pageSection->setOrdered(1);
        $manager->persist($pageSection);
      //  $this->addReference('pagesection_1', $pageSection);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PageFixtures::class,
            SectionFixtures::class,
        ];
    }
}
