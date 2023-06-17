<?php

namespace App\Repository;

use App\Entity\MessengerFriendships;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MessengerFriendships>
 *
 * @method MessengerFriendships|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessengerFriendships|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessengerFriendships[]    findAll()
 * @method MessengerFriendships[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessengerFriendshipsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessengerFriendships::class);
    }

    public function add(MessengerFriendships $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MessengerFriendships $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MessengerFriendships[] Returns an array of MessengerFriendships objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MessengerFriendships
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
