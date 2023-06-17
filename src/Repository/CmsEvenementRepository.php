<?php

namespace App\Repository;

use App\Entity\CmsEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CmsEvenement>
 *
 * @method CmsEvenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmsEvenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmsEvenement[]    findAll()
 * @method CmsEvenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmsEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmsEvenement::class);
    }

    public function add(CmsEvenement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CmsEvenement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function getEventInfo()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT title, description, date FROM App\Entity\CmsEvenement u'
        );
        return $query->getResult();
    }

//    /**
//     * @return CmsEvenement[] Returns an array of CmsEvenement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CmsEvenement
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
