<?php

namespace App\DataFixtures;

use App\Entity\PageSection;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $type = new Type();
        $type->setName('Hero Slider');
        $manager->persist($type);
        $this->addReference('type_Hero Slider', $type);
        $manager->flush();

        $type = new Type();
        $type->setName('Carousel Statique');
        $manager->persist($type);
        $this->addReference('type_Carousel Statique', $type);
        $manager->flush();

        $type = new Type();
        $type->setName('Carousel Dynamique');
        $manager->persist($type);
        $this->addReference('type_Carousel Dynamique', $type);
        $manager->flush();

        $type = new Type();
        $type->setName('Grille Dynamique');
        $manager->persist($type);
        $this->addReference('type_Grille Dynamique', $type);
        $manager->flush();

        $type = new Type();
        $type->setName('Publicité');
        $manager->persist($type);
        $this->addReference('Publicité', $type);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            PageSectionFixtures::class,
        ];
    }
}
