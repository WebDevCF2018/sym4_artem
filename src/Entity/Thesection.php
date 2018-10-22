<?php

namespace App\Entity;

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

}
