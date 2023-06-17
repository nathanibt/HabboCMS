<?php

namespace App\Entity;

use App\Repository\MessengerFriendshipsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessengerFriendshipsRepository::class)
 * @ORM\Table(name="messenger_friendships")
 */
class MessengerFriendships
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

        /**
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="user_one_id")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $useroneid;

    /**
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="user_two_id")
     * @ORM\JoinColumn(name="usertwoid", referencedColumnName="id")
     */
    private $usertwoid;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUserOneId(): ?int
    {
        return $this->useroneid;
    }
    public function getUserTwoId(): ?int
    {
        return $this->usertwoid;
    }
}
