<?php

namespace App\Entity;

use App\Repository\RoverCmdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoverCmdRepository::class)
 */
class RoverCmd
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
    private $datetime_cmd;

    /**
     * @ORM\Column(type="integer")
     */
    private $ohm1;

    /**
     * @ORM\Column(type="integer")
     */
    private $ohm2;

    /**
     * @ORM\Column(type="integer")
     */
    private $ohm3;

    /**
     * @ORM\Column(type="integer")
     */
    private $ohm4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime_cmd;
    }

    public function setDatetime(\DateTimeInterface $datetime_cmd): self
    {
        $this->datetime_cmd = $datetime_cmd;
        return $this;
    }

    public function getOhm1(): ?int
    {
        return $this->ohm1;
    }

    public function setOhm1(int $ohm1): self
    {
        $this->ohm1 = $ohm1;
        return $this;
    }

    public function getOhm2(): ?int
    {
        return $this->ohm2;
    }

    public function setOhm2(int $ohm2): self
    {
        $this->ohm2 = $ohm2;
        return $this;
    }

    public function getOhm3(): ?int
    {
        return $this->ohm3;
    }

    public function setOhm3(int $ohm3): self
    {
        $this->ohm3 = $ohm3;
        return $this;
    }

    public function getOhm4(): ?int
    {
        return $this->ohm4;
    }

    public function setOhm4(int $ohm4): self
    {
        $this->ohm4 = $ohm4;
        return $this;
    }
}
