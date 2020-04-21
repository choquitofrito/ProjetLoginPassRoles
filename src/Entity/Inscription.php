<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInscription;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GroupeMusique", inversedBy="inscriptions")
     */
    private $groupeMusique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Concours", inversedBy="inscriptions")
     */
    private $concours;

    public function __construct (){
        $this->setDateInscription (new \DateTime());

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getGroupeMusique(): ?GroupeMusique
    {
        return $this->groupeMusique;
    }

    public function setGroupeMusique(?GroupeMusique $groupeMusique): self
    {
        $this->groupeMusique = $groupeMusique;

        return $this;
    }

    public function getConcours(): ?Concours
    {
        return $this->concours;
    }

    public function setConcours(?Concours $concours): self
    {
        $this->concours = $concours;

        return $this;
    }
}
