<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity(fields={"username"}, message="There is already an account with this username")
 */
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=180, unique=true, options={"default"="Nouveau ici"})
     */
    private ?string $motto = 'Nouveau sur BackHabbo';


    /**
     * @ORM\Column(type="integer")
     */
    private ?int $rank = 1;

        /**
     * @ORM\Column(type="string")
     */
    private ?string $look = 'hr-115-42.hd-195-19.ch-3030-82.lg-275-1408.fa-1201.ca-1804-64';
    
    
    /**
     * @ORM\Column(type="integer")
     */
    private ?int $online = 0;


    /**
     * ORM\OneToMany(mappedBy: 'owner', targetEntity: Rooms::class)
     */
    private $rooms;

    /**
     * ORM\OneToMany(mappedBy: 'usertwoid', targetEntity: MessengersFriendships::class)
     */
    private $friends;


    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
 
    /**
     * @ORM\Column(type="string")
     */
    private $credits = 100000;

    /**
     * @ORM\Column(type="string")
     */
    private $pixels = 1000;




    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
    public function getMail(): string
    {
        return (string) $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    public function getMotto(): string
    {
        return (string) $this->motto;
    }

    public function setMotto(string $motto): self
    {
        $this->motto = $motto;

        return $this;
    }

    public function getRank(): ?int
    {
        return  $this->rank;
    }

    public function setRank($rank): self
    {
        $this->rank = $rank;

        return $this;
    }


    public function getLook(): ?string
    {
        return  $this->look;
    }

    public function getOnline(): ?int
    {
        return  $this->online;
    }

    public function setOnline($online): ?int
    {        
        $this->online = $online;

        return $this;
    } 


    public function getRooms(): ?ArrayCollection
    {
        return $this->rooms;
    }
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCredits(): string
    {
        return $this->credits;
    }

    public function setCredits(string $credits): self
    {
        $this->credits = $credits;

        return $this;
    }

    public function getPixels(): string
    {
        return $this->pixels;
    }

    public function setPixels(string $pixels): self
    {
        $this->pixels = $pixels;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function __construct()
    {

        $this->rooms = new ArrayCollection();
        $this->friends = new ArrayCollection();

    }

    
    
}
