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
        $pageSection->setPage($this->getReference('page_Football'));
        $pageSection->setSection($this->getReference('section_Championnat de France de Football'));
        $pageSection->setOrdered(2);
        $manager->persist($pageSection);

        $pageSection = new PageSection();
        $pageSection->setPage($this->getReference('page_Football'));
        $pageSection->setSection($this->getReference('section_TEST 2'));
        $pageSection->setOrdered(3);
        $manager->persist($pageSection);

        $pageSection = new PageSection();
        $pageSection->setPage($this->getReference('page_Football'));
        $pageSection->setSection($this->getReference('section_TEST 3'));
        $pageSection->setOrdered(4);
        $manager->persist($pageSection);

        $pageSection = new PageSection();
        $pageSection->setPage($this->getReference('page_Football'));
        $pageSection->setSection($this->getReference('section_TEST 4'));
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
