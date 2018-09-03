<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SlidesRepository")
 */
class Slides
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
    private $NomSlide;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SlideURL;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSlide(): ?string
    {
        return $this->NomSlide;
    }

    public function setNomSlide(string $NomSlide): self
    {
        $this->NomSlide = $NomSlide;

        return $this;
    }

    public function getSlideURL(): ?string
    {
        return $this->SlideURL;
    }

    public function setSlideURL(string $SlideURL): self
    {
        $this->SlideURL = $SlideURL;

        return $this;
    }

}
