<?php

namespace App\Entity;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\RoomsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomsRepository::class)
 */
class Rooms
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

/**
 * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="rooms")
 * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
 */
    private ?Users $owner = null;

    /**
     * @ORM\Column(type="string")
     */
    private ?string $name = null;

        /**
     * @ORM\Column(type="string")
     */
    private ?string $description;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getOwner(): ?string
    {
        return $this->owner;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function __construct(Users $owner)
    {
        $this->owner = $owner;
    }



}
