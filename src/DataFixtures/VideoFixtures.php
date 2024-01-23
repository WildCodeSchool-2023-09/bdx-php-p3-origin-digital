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


        $video = new Video();
        $video->setTitle('Le passage triomphal de Manon Hily, au championnat de France
        d\'escalade de difficulté 2023 !');
        $video->setFile('Le passage triomphal de Manon Hily au championnat de France
        d escalade de difficulté 2023.mp4');
        $video->setImage('escalade.webp');
        $video->setDescription('Manon Hily est devenue championne de France 2023
        d escalade de difficulté, pour la première fois de sa carrière.');
        $video->addCategory($this->getReference('category_Escalade'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(false);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('MONDIAUX ESCALADE 2023, 18 ans, Oriane Bertone est vice-championne du monde de bloc !');
        $video->setFile('escalade23-oriane.mp4');
        $video->setImage('oriane.jpg');
        $video->setDescription('MONDIAUX ESCALADE 2023 - Après le doublé français chez les hommes, c\'est
        Oriane Bertone qui a réalisé une superbe finale pour décrocher la médaille dargent derrière l\'intouchable
        Janja Garnbret..');
        $video->addCategory($this->getReference('category_Escalade'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Manon Hily face à Biographie (9a+)');
        $video->setFile('Manonhily9a.mp4');
        $video->setImage('ManonH.jpg');
        $video->setDescription('Extrait : le mini docu sur Manon Hily et son nouveau projet : Biographie. Une
         des voies mythiques de Céüse (9a+)' );
        $video->addCategory($this->getReference('category_Escalade'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('UFC 285 : Shevchenko se fait surprendre par Grasso et perd le titre mondial');
        $video->setFile('ufc-285-shevchenkoVSgrasso.mp4');
        $video->setImage('MMAshev.jpg');
        $video->setDescription('Valentina Shevchenko domine sa catégorie depuis des années mais a été surprise
         par Alexa Grasso avec un étranglement à la 4e reprise.' );
        $video->addCategory($this->getReference('category_MMA'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('UFC 239 : Amanda Nunes !');
        $video->setFile('amanda-nunes.mp4');
        $video->setImage('Nunes.jpg');
        $video->setDescription('Amanda Nunes, née le 30 mai 1988 à Pojuca, est une pratiquante brésilienne
        d\'arts martiaux mixtes. Double championne à l\'Ultimate Fighting Championship' );
        $video->addCategory($this->getReference('category_MMA'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Escalade : Angela Eiter réalise le premier 9b féminin');
        $video->setFile('AngelaEiter.mp4');
        $video->setImage('Angela.jpg');
        $video->setDescription('Villanueva del Rosario, près de Malaga en Espagne. Sur « La Planta de Shiva »,
         avec Angela Eiter, une des meilleures grimpeuses de la planète. l’Autrichienne a récemment réaliser le premier
          9b féminin ! ' );
        $video->addCategory($this->getReference('category_Escalade'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Serena Williams : US Open 2020');
        $video->setFile('serena-williams.mp4');
        $video->setImage('serena.jpg');
        $video->setDescription(' Regardez le meilleur cliché de Serena Williams lors de l\'US Open 2020 ! ' );
        $video->addCategory($this->getReference('category_Tennis'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Magdalena Frech v Coco Gauff | Round Four | Australian Open 2024');
        $video->setFile('magdalena-frech-v-coco-gauff.mp4');
        $video->setImage('Magdalena Frech v Coco Gauff.jpg');
        $video->setDescription('Open d’Australie 2024 en direct sur Eurosport.' );
        $video->addCategory($this->getReference('category_Tennis'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Roland-Garros 2023 : le résumé de la finale (F) I.Swiatek vs K.Muchova');
        $video->setFile('iswiatek-vs-kmuchova.mp4');
        $video->setImage('garrosMuchova.jpg');
        $video->setDescription('Iga Swiatek de nouveau reine de Roland-Garros. La Polonaise, n°1 mondiale,
        parvient à dominer la Tchèque Karolina Muchova !' );
        $video->addCategory($this->getReference('category_Tennis'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Betisier Athlétisme');
        $video->setFile('betisierAthle.mp4');
        $video->setImage('betisierathle.jpg');
        $video->setDescription('Les meilleures chuttes de la dicipline !' );
        $video->addCategory($this->getReference('category_Funny'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setTitle('Betisier 1');
        $video->setFile('drole.mp4');
        $video->setImage('droles.jpg');
        $video->setDescription('Attrapée !' );
        $video->addCategory($this->getReference('category_Funny'));
        $video->setDatetime(new DateTimeImmutable());
        $slug = $this->slugger->slug($video->getTitle());
        $video->setSlugVideo($slug);
        $video->setIsPublic(true);
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
