<?php

namespace App\Entity;

use App\Repository\CmsEvenementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CmsEvenementRepository::class)
 * @ORM\Table(name="cms_evenement")
 */
class CmsEvenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $datedebut;

        /**
     * @ORM\Column(type="string", length=255)
     */
    private $datefin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->datedebut;
    }

    public function setDateDebut(string $date): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }
    public function getDateFin(): ?string
    {
        return $this->datefin;
    }

    public function setDateFin(string $date): self
    {
        $this->datefin = $datefin;

        return $this;
    }
}
