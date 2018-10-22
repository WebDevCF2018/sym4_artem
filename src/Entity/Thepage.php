<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Thepage
 *
 * @ORM\Table(name="thepage", indexes={@ORM\Index(name="fk_thepage_author_idx", columns={"author_idauthor"})})
 * @ORM\Entity
 */
class Thepage
{
    /**
     * @var int
     *
     * @ORM\Column(name="idthepage", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idthepage;

    /**
     * @var string
     *
     * @ORM\Column(name="thetitle", type="string", length=250, nullable=false)
     */
    private $thetitle;

    /**
     * @var string
     *
     * @ORM\Column(name="thelongtext", type="text", length=65535, nullable=false)
     */
    private $thelongtext;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="thetime", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $thetime = 'CURRENT_TIMESTAMP';

    /**
     * @var \Author
     *
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_idauthor", referencedColumnName="idauthor")
     * })
     */
    private $authorauthor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Thesection", inversedBy="thepagethepage")
     * @ORM\JoinTable(name="thepage_has_thesection",
     *   joinColumns={
     *     @ORM\JoinColumn(name="thepage_idthepage", referencedColumnName="idthepage")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="thesection_idthesection", referencedColumnName="idthesection")
     *   }
     * )
     */
    private $thesectionthesection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->thesectionthesection = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdthepage(): ?int
    {
        return $this->idthepage;
    }

    public function getThetitle(): ?string
    {
        return $this->thetitle;
    }

    public function setThetitle(string $thetitle): self
    {
        $this->thetitle = $thetitle;

        return $this;
    }

    public function getThelongtext(): ?string
    {
        return $this->thelongtext;
    }

    public function setThelongtext(string $thelongtext): self
    {
        $this->thelongtext = $thelongtext;

        return $this;
    }

    public function getThetime(): ?\DateTimeInterface
    {
        return $this->thetime;
    }

    public function setThetime(?\DateTimeInterface $thetime): self
    {
        $this->thetime = $thetime;

        return $this;
    }

    public function getAuthorauthor(): ?Author
    {
        return $this->authorauthor;
    }

    public function setAuthorauthor(?Author $authorauthor): self
    {
        $this->authorauthor = $authorauthor;

        return $this;
    }

    /**
     * @return Collection|Thesection[]
     */
    public function getThesectionthesection(): Collection
    {
        return $this->thesectionthesection;
    }

    public function addThesectionthesection(Thesection $thesectionthesection): self
    {
        if (!$this->thesectionthesection->contains($thesectionthesection)) {
            $this->thesectionthesection[] = $thesectionthesection;
        }

        return $this;
    }

    public function removeThesectionthesection(Thesection $thesectionthesection): self
    {
        if ($this->thesectionthesection->contains($thesectionthesection)) {
            $this->thesectionthesection->removeElement($thesectionthesection);
        }

        return $this;
    }

}
