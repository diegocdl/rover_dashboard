<?php

namespace App\Entity;

use App\Repository\CameraImgRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CameraImgRepository::class)
 */
class CameraImg
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime_img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatetimeImg(): ?\DateTimeInterface
    {
        return $this->datetime_img;
    }

    public function setDatetimeImg(\DateTimeInterface $datetime_img): self
    {
        $this->datetime_img = $datetime_img;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }
}
