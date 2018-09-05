<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SliderRepository")
 */
class Slider
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
    private $slideImage;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alternative;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SlideUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlideImage(): ?string
    {
        return $this->slideImage;
    }

    public function setSlideImage(string $slideImage): self
    {
        $this->slideImage = $slideImage;

        return $this;
    }

    public function getSlideUrl()
    {
        return $this->SlideUrl;
    }

    public function setSlideUrl( $SlideUrl)
    {
        $this->SlideUrl = $SlideUrl;

        return $this;
    }

    public function getAlternative(): ?string
    {
        return $this->alternative;
    }

    public function setAlternative(string $alternative): self
    {
        $this->alternative = $alternative;

        return $this;
    }
}
