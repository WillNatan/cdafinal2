<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MusiquesRepository")
 */
class Musiques
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
    private $UrlMusiques;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUrlMusiques(): ?string
    {
        return $this->UrlMusiques;
    }

    public function setUrlMusiques(string $UrlMusiques): self
    {
        $this->UrlMusiques = $UrlMusiques;

        return $this;
    }
}
