<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Thesection
 *
 * @ORM\Table(name="thesection")
 * @ORM\Entity
 */
class Thesection
{
    /**
     * @var int
     *
     * @ORM\Column(name="idthesection", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idthesection;

    /**
     * @var string
     *
     * @ORM\Column(name="thenamesection", type="string", length=120, nullable=false)
     */
    private $thenamesection;

    /**
     * @var string
     *
     * @ORM\Column(name="thedescriptif", type="string", length=500, nullable=false)
     */
    private $thedescriptif;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thepage", mappedBy="thesectionthesection")
     */
    private $thepagethepage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->thepagethepage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdthesection(): ?int
    {
        return $this->idthesection;
    }

    public function getThenamesection(): ?string
    {
        return $this->thenamesection;
    }

    public function setThenamesection(string $thenamesection): self
    {
        $this->thenamesection = $thenamesection;

        return $this;
    }

    public function getThedescriptif(): ?string
    {
        return $this->thedescriptif;
    }

    public function setThedescriptif(string $thedescriptif): self
    {
        $this->thedescriptif = $thedescriptif;

        return $this;
    }

    /**
     * @return Collection|Thepage[]
     */
    public function getThepagethepage(): Collection
    {
        return $this->thepagethepage;
    }

    public function addThepagethepage(Thepage $thepagethepage): self
    {
        if (!$this->thepagethepage->contains($thepagethepage)) {
            $this->thepagethepage[] = $thepagethepage;
            $thepagethepage->addThesectionthesection($this);
        }

        return $this;
    }

    public function removeThepagethepage(Thepage $thepagethepage): self
    {
        if ($this->thepagethepage->contains($thepagethepage)) {
            $this->thepagethepage->removeElement($thepagethepage);
            $thepagethepage->removeThesectionthesection($this);
        }

        return $this;
    }

}
