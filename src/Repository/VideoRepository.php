<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Video>
 *
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Video::class);
    }

    public function findAllPublic(): array
    {
        return $this->createQueryBuilder('v')
            ->where('v.isPublic = :public')
            ->setParameter('public', true)
            ->getQuery()
            ->getResult();
    }

    public function findLikeName(string $name): array
    {
        $result = [];
        if (!empty($name)) {
            $result = $this->createQueryBuilder('v')
                ->andWhere('v.title LIKE :name')
                ->setParameter('name', '%' . $name . '%')
                ->orderBy('v.title', 'ASC')
                ->getQuery()
                ->getResult();
        }
        return $result;
    }

    public function findByName(string $name): array
    {
        $queryBuilder = $this->createQueryBuilder('v')
            ->leftJoin('v.categories', 'c')
            ->where('v.title LIKE :name OR c.name LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->orderBy('v.title', 'ASC')
            ->getQuery();

        return $queryBuilder->getResult();
    }


//    /**
//     * @return Video[] Returns an array of Video objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Video
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
