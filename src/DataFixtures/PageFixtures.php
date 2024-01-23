<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Page;

class PageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
         $page = new Page();
         $page->setName('Football Féminin');
         //$page->addPageSection($this->getReference('pagesection_1'));
         $manager->persist($page);
         $this->addReference('page_Football Féminin', $page);

         $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SectionFixtures::class,
         //  PageSectionFixtures::class,
        ];
    }
}
