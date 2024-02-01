<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Page;
use Symfony\Component\String\Slugger\SluggerInterface;

class PageFixtures extends Fixture implements DependentFixtureInterface
{
    private SluggerInterface $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
         $page = new Page();
         $page->setName('Football Féminin');
         $slug = $this->slugger->slug($page->getName());
         $page->setSlugPage($slug);
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
