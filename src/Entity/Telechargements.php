<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TelechargementsRepository")
 */
class Telechargements
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UrlTelechargements;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomLier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomFichier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $UrlFichier;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlTelechargements(): ?string
    {
        return $this->UrlTelechargements;
    }

    public function setUrlTelechargements(string $UrlTelechargements): self
    {
        $this->UrlTelechargements = $UrlTelechargements;

        return $this;
    }

    public function getNomLier(): ?string
    {
        return $this->NomLier;
    }

    public function setNomLier(string $NomLier): self
    {
        $this->NomLier = $NomLier;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->NomFichier;
    }

    public function setNomFichier(string $NomFichier): self
    {
        $this->NomFichier = $NomFichier;

        return $this;
    }

    public function getUrlFichier(): ?string
    {
        return $this->UrlFichier;
    }

    public function setUrlFichier(string $UrlFichier): self
    {
        $this->UrlFichier = $UrlFichier;

        return $this;
    }

}
