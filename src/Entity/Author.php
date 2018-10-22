<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="author", uniqueConstraints={@ORM\UniqueConstraint(name="lenom_UNIQUE", columns={"thenickname"})})
 * @ORM\Entity
 */
class Author
{
    /**
     * @var int
     *
     * @ORM\Column(name="idauthor", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idauthor;

    /**
     * @var string
     *
     * @ORM\Column(name="thenickname", type="string", length=80, nullable=false)
     */
    private $thenickname;

    /**
     * @var string
     *
     * @ORM\Column(name="thepwd", type="string", length=80, nullable=false)
     */
    private $thepwd;

    /**
     * @var string
     *
     * @ORM\Column(name="thecompletename", type="string", length=120, nullable=false)
     */
    private $thecompletename;


}
