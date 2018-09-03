<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaylistsRepository")
 */
class Playlists
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
    private $PlaylistsName;

    public function getId() : ? int
    {
        return $this->id;
    }

    public function getPlaylistsName(): ?string
    {
        return $this->PlaylistsName;
    }

    public function setPlaylistsName(string $PlaylistsName): self
    {
        $this->PlaylistsName = $PlaylistsName;

        return $this;
    }
}
