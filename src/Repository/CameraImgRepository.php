<?php

namespace App\Repository;

use App\Entity\CameraImg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CameraImg|null find($id, $lockMode = null, $lockVersion = null)
 * @method CameraImg|null findOneBy(array $criteria, array $orderBy = null)
 * @method CameraImg[]    findAll()
 * @method CameraImg[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CameraImgRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CameraImg::class);
    }

    public function getLast() {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT c
            FROM App\Entity\CameraImg c
            ORDER BY c.datetime_img DESC'
        )->setMaxResults(1);
        $result = $query->getResult();
        if (sizeof($result) > 0) {
            return $result[0];
        } else {
            return null;
        }
    }


    // /**
    //  * @return CameraImg[] Returns an array of CameraImg objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CameraImg
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
