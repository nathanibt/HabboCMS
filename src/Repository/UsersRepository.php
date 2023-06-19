<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<Users>
 *
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    public function add(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function getUsersInfo()
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT u.username, u.motto, u.look, u.rank, u.online FROM App\Entity\Users u'
        );
        return $query->getResult();
    }


    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof Users) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->add($user, true);
    }

    public function getUsersFromDiscordOAuth( 
        string $discordid,
        string $discordusername,
        string $mail
    ): ?Users
    {
        $user = $this->findOneBy([
            'mail' => $mail
        ]);

        if (!$user) {
            return null;
        }

        
        if ($user->getDiscordID() !== $discordid) {
            $user = $this->updateUserWithDiscordData($discordid, $discordusername, $user);
        }

        return $user;
    }

    public function updateUserWithDiscordData(
        string $discordid,
        string $discordusername,
        Users $user
    ): Users
    {
        $user->setDiscordID($discordid)
             ->setDiscordUsername($discordusername);
    
        $this->_em->flush();

        return $user;
    }

    public function createUsersFromDiscordOAuth( 
        string $discordid,
        string $discordusername,
        string $mail,
        string $newHashedPassword
    ): ?Users
    {
        $user = new Users();

        $user->setDiscordID($discordid)
             ->setDiscordUsername($discordusername)
             ->setMail($mail)
             ->setPassword($newHashedPassword);

        $this->_em->persist($user);

        $this->_em->flush();

        return $user;
    }


//    /**
//     * @return Users[] Returns an array of Users objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Users
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
