<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageSlideRepository")
 */
class ImageSlide
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(mimeTypes={ "image/*"})
     */
    private $imageUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alternative;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setImageUrl( $imageUrl)
    {
        $this->imageUrl = $imageUrl;

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
