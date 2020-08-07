<?php

namespace App\Repository;

use App\Entity\RoverCmd;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RoverCmd|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoverCmd|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoverCmd[]    findAll()
 * @method RoverCmd[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoverCmdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoverCmd::class);
    }

    public function getLast() : RoverCmd {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\RoverCmd r
            ORDER BY r.datetime_cmd DESC'
        )->setMaxResults(1);
        $result = $query->getResult();
        if (sizeof($result) > 0) {
            return $result[0];
        } else {
            return [];
        }
    }

    // /**
    //  * @return RoverCmd[] Returns an array of RoverCmd objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RoverCmd
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
